<?php

namespace App\Http\Controllers;

/*
 * Antvel - Home Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */
//use App\Http\Requests\Request;
use App\Models\AgroUser;
use App\Models\UserShops;
use App\Order;
use Antvel\Product\Products;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    }

    /**
     * Shows the home page.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $page_count = 8;
        $productsTop = Product::where(['status' => 1, 'moderation' => 0])->orderBy('updated_at', 'DESC')->whereHas('user_products')->paginate($page_count);
        $productsSuggestions = Product::orderBy('created_at', 'ASC')->paginate($page_count);
        if($request->method() == 'GET'){
            return view('main', ['data' =>[
                'banner' => Banner::all(),
                'productsTop' => $productsTop,
                'productsSuggestions' => $productsSuggestions,
                'events' => [],
            ]]);
        } else {
            return response()->json(['products' => Product::where('status', 1)->orderBy('updated_at', 'DESC')->whereHas('user_products')->paginate($page_count)]);
        }
    }

    public function getCategories()
    {
        return Category::where('category_id', null)->get()->toJson();
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

    public function checkUser(Request $request)
    {
        $user = AgroUser::findOrFail(Auth::id());
        $user_companies = \DB::table('agroyard_company_users as acu')
                                        ->where('user_id', Auth::id())
                                        ->join('agroyard_companies as ac', 'acu.company_id', 'ac.id')
                                        ->whereIn('ac.status_id', [2,3,6])
                                        ->select('ac.*')
                                        ->get();
        if(!count($user_companies)){
            return response()->json(['status' => 0, 'errors' => [['text' => 'Нет активных компаний']]], 200);
        } else {
            return response()->json(['status' => 1], 200);
        }

    }

    public function setRole(Request $request)
    {
        $user = Auth::user();
        $user_companies = \DB::table('agroyard_company_users as acu')
            ->where('user_id', Auth::id())
            ->join('agroyard_companies as ac', 'acu.company_id', 'ac.id')
            ->whereIn('ac.status_id', [2,3,6])
            ->select('ac.*')
            ->get();
        if(count($user_companies) && $request->input('role') == 'seller'){
            foreach ($user_companies as $company){
                UserShops::create([
                   'name' => $company->compName,
                    'company_id' => $company->id,
                    'user_id' => $user->id
                ]);
            }
            $user->role = 'seller';
            $user->save();
            return response()->json(['status' => 1, 'user' => $user]);
        } elseif($request->input('role') == 'customer') {
            $user->role = 'customer';
            $user->save();
            return response()->json(['status' => 1, 'user' => $user]);
        }
    }
}
