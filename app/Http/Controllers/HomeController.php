<?php
namespace App\Http\Controllers;

/*
 * Antvel - Home Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

//use App\Http\Requests\Request;
use App\Models\AgroUser;
use App\Models\CompanyUsers;
use App\Models\UserShops;
use App\Order;
use Antvel\Product\Products;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{

    /**
     * The products repository.
     *
     * @var Products
     */
    protected $products = null;

    /**
     * The suggestion keys.
     *
     * @var array
     */
    protected $listing = ['product_viewed', 'product_purchased', 'product_categories'];

    /**
     * Creates a new instance.
     *
     * @param Products $products
     *
     * @return void
     */
    public function __construct(Products $products)
    {
        $this->middleware('auth')->only('dashboard');

        $this->products = $products;
//        self::updDb();
    }

    /**
     * Shows the home page.
     *
     * @return void
     */
    private function updDb()
    {
        foreach (Product::all() as $product) {
            $mainProduct = $product;

            $minPrice = \DB::table('user_products')
                ->where('status', 1)
                ->where('product_id', $mainProduct->id)
                ->min('price');

            $maxPrice = \DB::table('user_products')
                ->where('status', 1)
                ->where('product_id', $mainProduct->id)
                ->max('price');

            $mainProduct->price_min = $minPrice;
            $mainProduct->price_max = $maxPrice;

            $mainProduct->status = 1;

            $mainProduct->save();
        }
    }

    public function index(Request $request)
    {
        if (Auth::id() && Auth::user()->role == 'noselect') {
            self::setRole();
        }
        $page_count = 12;

        $productsTop = Product::where(['status' => 1, 'moderation' => 0])
            ->orderBy('updated_at', 'DESC')
            ->paginate($page_count);

        $productsSuggestions = Product::orderBy('created_at', 'ASC')
            ->paginate($page_count);
        if ($request->method() == 'GET') {
            return view('main', ['data' => [
                    'banner' => Banner::all(),
                    'productsTop' => $productsTop,
                    'productsSuggestions' => $productsSuggestions,
                    'events' => [],
                    'translate' => trans('index.index')
            ]]);
        } else {
            return response()->json(['products' => Product::where('status', 1)
                        ->orderBy('updated_at', 'DESC')
                        ->paginate($page_count)]);
        }
    }

    public function getCategories()
    {
        return response()->json(Category::where('parent_category_id', null)->where('status','=','1')->get(), 200);
    }

    /**
     * Returns a tags array based upon the given suggestions.
     *
     * @param  array $suggestion
     *
     * @return array
     */
    protected function tagsCloud($suggestion)
    {
        return collect($suggestion->items)->map(function ($item) {
                $tags[] = explode(',', $item->pluck('tags')->implode(','));
                return $tags;
            })->flatten()->unique()->all();
    }

    public function getShopList() {
        $per_page = 9;
        $shop_list = UserShops::paginate($per_page);
        $categories = Category::where('parent_category_id', null)->get();
        return view('shop-list', compact('shop_list', 'categories'));
    }

    public function filterShops(Request $request)
    {
        $v = Validator::make($request->all(), [
            'category_ids' => 'present|array',
        ]);

        if (count($v->errors())) {
            return response()->json(['status' => 0], 400);
        }
        $per_page = 20;
        $category_ids = $request->input('category_ids');

        $clear_category_ids = [];

        foreach ($category_ids as $category_id) {
            $category = Category::find($category_id);
            array_push($clear_category_ids, $category_id);
            if (!$category->parent_category_id) {

                $all_categories_ids = $category->children()->get()->pluck('id')->toArray();

                if ($all_categories_ids) {
                    $clear_category_ids = array_merge($clear_category_ids, $all_categories_ids);
                }
            }
        }
        \Log::info($clear_category_ids);
        if (count($clear_category_ids)) {
           $shop_list = UserShops::whereHas('products', function ($q) use ($clear_category_ids) {
                $q->whereIn('category_id', $clear_category_ids);
            })->paginate($per_page);
//            $cat = implode(',',$category_ids);
//          $shop_list = \DB::select("SELECT id FROM user_shops WHERE user_shops.id in (select products.user_shop_id from products,categories  where category_id in ($cat) group by products.user_shop_id) ");
//            #$category_ids*/
          /*  $shop_list =DB::table('user_shops')->whereIn()*/
        } else {
            $shop_list = UserShops::paginate($per_page);
        }

        return response()->json(['shop_list' => $shop_list,'category'=> $category_ids], 200);
    }

    public function getShopListPost(Request $request)
    {
        $v = Validator::make($request->all(), [
            'q' => 'string',
            'date_sort' => array('string', Rule::in(['asc', 'desc']))
        ]);

        if (count($v->errors())) {
            return response()->json(['status' => 0], 400);
        }

        /**
         * get shops with params
         */

        $checked_shop = UserShops::where('name', 'q')
                        ->orderBy('date_sort');
        return $checked_shop;
    }
    //moved here while refactoring
    public function summary()
    {
        $panel = [
            'left' => ['width' => '2', 'class' => 'user-panel'],
            'center' => ['width' => '10'],
        ];

        $query = Order::auth()->ofType('order')->get();
        $orders = ['closed' => 0, 'open' => 0, 'cancelled' => 0, 'all' => $query->count(), 'total' => 0, 'nopRate' => 0];

        foreach ($query as $row) {
            if ($row->status == 'cancelled') {
                $orders['cancelled'] ++;
            } elseif ($row->status == 'closed') {
                $orders['closed'] ++;
            } else {
                $orders['open'] ++;
            }
            foreach ($row->details as $deta) {
                $orders['total'] += ($deta->quantity * $deta->price);
                if ($row->status == 'closed' && !$deta->rate) {
                    $orders['nopRate'] ++;
                }
            }
        }
        unset($query);
        $sales = null;
        if (\Auth::check() && \Auth::user()->hasRole(['business', 'admin'])) {
            $orders = Order::where('seller_id', \Auth::user()->id)->ofType('order')->get();
            $sales = ['closed' => 0, 'open' => 0, 'cancelled' => 0, 'all' => $orders->count(), 'total' => 0, 'rate' => 0, 'numRate' => 0, 'totalRate' => 0, 'nopRate' => 0];
            foreach ($orders as $row) {
                if ($row->status == 'cancelled') {
                    $sales['cancelled'] ++;
                } elseif ($row->status == 'closed') {
                    $sales['closed'] ++;
                } else {
                    $sales['open'] ++;
                }
                foreach ($row->details as $deta) {
                    $sales['total'] += ($deta->quantity * $deta->price);
                    if ($row->status == 'closed' && $deta->rate) {
                        $sales['numRate'] ++;
                        $sales['totalRate'] = $sales['totalRate'] + $deta->rate;
                    }
                    if ($row->status == 'closed' && !$deta->rate) {
                        $sales['nopRate'] ++;
                    }
                }
            }
            if ($sales['numRate']) {
                $sales['rate'] = $sales['totalRate'] / $sales['numRate'];
            }
        }

        return view('user.summary', compact('panel', 'orders', 'sales'));
    }

    private function setRole()
    {
//        $user = Auth::user();
//        $user_companies_tmp = CompanyUsers::whereHas('company', function($q){
//            $q->where('companyRole', 'like', '%2%');
//            $q->whereIn('status_id', [2,3,6]);
//        })->where('user_id', $user->id)->get()->load('company');
//        if(count($user_companies_tmp)){
//            foreach ($user_companies_tmp as $company_user){
//                    UserShops::create([
//                        'name' => $company_user->company->compName,
//                        'company_id' => $company_user->company_id,
//                    ]);
//            }
//            $user->role = 'seller';
//            $user->save();
//        } else {
//            $user->role = 'customer';
//            $user->save();
//        }
    }
}
