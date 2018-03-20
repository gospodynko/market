<?php
namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\DeliveryType;
use App\Models\PayType;
use App\Models\CreditAlliances;
use App\Models\UserProductOffers;
use App\Models\UserShops;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserProduct;
use App\Models\Producer;
use App\Models\Category;
use App\Helpers\ProductsHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateBannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    private $form_rules_user_product = [
        'category_id' => 'required',
        'product_id' => 'required',
        'producer_id' => 'required',
        'currency' => 'required',
        'price' => array('required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'),
        'delivery_id' => 'required',
        'pay_id' => 'required',
    ];

    private function rulesUserUpdate()
    {
        $rules = $this->form_rules_user_product;
        return $rules;
    }


    public function indexProducts(Request $request)
    {
        $products = Product::with('category','producer')
            ->paginate(20);


        return view('dashboard.sections.products.index', [
            'products' => $products,
        ]);
    }

    public function indexProducers(Request $request)
    {
        $producers = Producer::
            paginate(20);
        return view('dashboard.sections.producers.index', [
            'producers' => $producers,
        ]);
    }

    public function storeProducer(Request $request)
    {
        if (!$request->input('category_id') || in_array(NULL, $request->input('category_id'))) {
            return redirect()->back()
                    ->withErrors(['category_id' => [trans('globals.error') . ' не обрано категорію']]);
        }

        $producer = new Producer();
        $producer->category_id = \GuzzleHttp\json_encode($request->input('category_id'));
        $producer->name = $request->input('name');
        $producer->created_by = \Auth::id();
        $producer->updated_by = \Auth::id();
        $producer->save();

        $message = '';
        Session::flash('message', trans('product.controller.saved_successfully') . $message);

        return redirect('admin/producers');
    }

    public function editProducer($id)
    {
        $producer = Producer::find($id);
        $arrayCategories = Category::actives()
            ->where('category_id', NULL)
            ->lightSelection()
            ->get()
            ->toArray();

        $categories = [
            '' => trans('product.controller.select_category'),
        ];


        //categories drop down formatted
        ProductsHelper::categoriesDropDownFormat($arrayCategories, $categories);

        $edit = true;

        return view('dashboard.sections.producers.create', compact('producer', 'categories', 'edit', 'productsDetails'));
    }

    public function createProducer(Request $request)
    {
        $producer = Producer::find(-50);
        $arrayCategories = Category::actives()
            ->where('category_id', NULL)
            ->lightSelection()
            ->get()
            ->toArray();

        $categories = [
            '' => trans('product.controller.select_category'),
        ];


        //categories drop down formatted
        ProductsHelper::categoriesDropDownFormat($arrayCategories, $categories);

        $edit = false;

        return view('dashboard.sections.producers.create', compact('producer', 'categories', 'edit', 'productsDetails'));
    }

    public function updateProducer($id, Request $request)
    {
        $producer = Producer::find($id);

        $producer->category_id = \GuzzleHttp\json_encode($request->input('category_id'));
        $producer->name = $request->input('name');
        $producer->created_by = \Auth::id();
        $producer->updated_by = \Auth::id();
        $producer->save();

        $message = '';
        Session::flash('message', trans('product.controller.saved_successfully') . $message);

        return redirect('admin/producers/' . $id . '/edit');
    }

    public function getProducersList(Request $request)
    {
        $category = Category::find($request->category_id);

        return response()->json($category->producers, 200);
    }

    public function getBannersList()
    {
        $banners = Banner::all();

        return view('dashboard.sections.banners.index', ['banners' => $banners]);
    }

    public function createBanner(CreateBannerRequest $request)
    {
        $banner = Banner::create([
                'is_special' => $request->input('is_special'),
                'url' => $request->input('url'),
                ]
        );

        $banner->image = $request->file('image')->getRealPath();
        $banner->save();
    }

    public function getProductsList(Request $request)
    {
        return json_encode(\App\Models\Product::select('id', 'name')->where('producer_id', $request->input('producer_id'))->get());
    }

    public function moderateList()
    {
        $per_page = 20;
        return view('dashboard.sections.moderations.index', ['products' => Product::where('moderation', 1)->paginate($per_page)]);
    }
    public function viewProduct($id)
    {
        return view('dashboard.sections.moderations.view', ['product' => Product::find($id)->load('user')]);
    }
    public function acceptProduct($id)
    {
        if(Auth::user()->role !== 'admin') return false;
        $product = Product::find($id);
        $product->moderation = 0;
        $product->save();
        return redirect('/admin/moderation', 302);
    }

    public function deliveryList()
    {
        $count_page = 15;
        return view('dashboard.sections.delivery.index', ['deliveries' => DeliveryType::paginate($count_page)]);
    }

    public function paymentList()
    {
        $count_page = 15;
        return view('dashboard.sections.payment.index', ['payments' => PayType::paginate($count_page)]);
    }

    public function deliveryCreate()
    {
        return view('dashboard.sections.delivery.create');
    }

    public function paymentCreate()
    {
        return view('dashboard.sections.payment.create');
    }

    public function storePayment(Request $request)
    {
        PayType::create([
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name'))
        ]);
        return response()->json(['message' => 'success'], 200);
    }
    public function storeDelivery(Request $request)
    {
        DeliveryType::create([
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name'))
        ]);
        return response()->json(['message' => 'success'], 200);
    }

    public function updateCategory(Request $request)
    {
//        dd($request);
        $category = $request->all();
        $category['slug'] = str_slug($category['name']);
        unset($category['parent']);
        $upd_cat = Category::find($category['id']);

        $upd_cat->update($category);

        return response()->json(['status' => 1], 200);

    }

    public function indexUserProducts()
    {
//        dd(UserProduct::with('mainProduct')->get()->toArray());
        $page_count = 20;
        return view('dashboard.sections.products.user', ['data' => [
            'user_product' => UserProduct::with('mainProduct')->paginate($page_count)
        ]]);
    }

    public function editUserProducts($id){
//        dd(UserProduct::find($id)->first());
        return view('dashboard.sections.products.user-edit', ['data' => [
            'user_product' => UserProduct::with('currency')->where('id', $id)->first(),
            'currencies' => Currency::all(),
            'deliveries' => DeliveryType::all(),
            'pays' => PayType::all()
        ]]);
    }

    public function updateUserProducts($id, Request $request)
    {
        $rules = $this->rulesUserUpdate();
//        dd($request->all());
        $v = Validator::make($request->all(), $rules);
        if($v->fails()){
            return redirect()->back()
                ->withErrors($v->errors())->withInput();
        }
        $user_product = UserProduct::find($request->input('id'));
        $user_product->price = $request->input('price');
        $user_product->currency_id = $request->input('currency')['id'];
        $user_product->quantity_price = $request->input('quantity_price');
        $user_product->updated_by = Auth::id();
        $user_product->delivery_types()->sync(array_map(create_function('$ids', 'return $ids[\'id\'];'), $request->input('delivery_types')));
        $user_product->pay_types()->sync(array_map(create_function('$ids', 'return $ids[\'id\'];'), $request->input('pay_types')));
        $user_product->save();

        $mainProduct = Product::find($user_product->product_id);

        $minPrice = DB::table('user_products')
            ->where('status', 1)
            ->where('product_id', $user_product->product_id)
            ->min('price');

        $maxPrice = DB::table('user_products')
            ->where('status', 1)
            ->where('product_id', $user_product->product_id)
            ->min('price');

        $mainProduct->price_min = ($minPrice > $user_product->price) ? $user_product->price : $minPrice;
        $mainProduct->price_max = ($maxPrice < $user_product->price) ? $user_product->price : $maxPrice;

        $mainProduct->status = 1;

        $mainProduct->save();


        return response()->json(['status' => 1], 200);
    }

    public function delProductAdmin($id){
        $product = Product::findOrFail($id);
        $product->user_products()->delete();
        $product->delete();
        return redirect()->back();
    }

    public function delProductUserAdmin($id)
    {
        $product = UserProduct::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    public function indexOrders()
    {
        return view('dashboard.sections.orders.index', ['data' => [
            'orders' => UserProductOffers::all()
        ]]);
    }

    public function viewShops(Request $request)
    {
        $per_page = 20;
        $shops = UserShops::paginate($per_page)->toJson();
        if($request->method() == 'GET'){
            return view('dashboard.sections.shops.index', compact('shops'));
        } else {
            return $shops;
        }
    }

    public function changeStatusShop($id, Request $request)
    {
        $shop = UserShops::findOrFail($id);
        $shop->status = $request->input('status');
        $shop->save();
        return json_encode(['status' => 1]);
    }

    public function allianceCreate()
    {
        return view('dashboard.sections.credits.create');
    }

    public function storeAlliance(Request $request)
    {
        CreditAlliances::create([
            'title' => $request->input('title'),
            'contacts' =>$request->input('contacts')
        ]);
        return response()->json(['message' => 'success'], 200);
    }
    public function allianceList()
    {
        $count_page = 15;
        return view('dashboard.sections.credits.index', ['credits' => CreditAlliances::paginate($count_page)]);
    }

    public function editAlliance($id)
    {
        return view('dashboard.sections.credits.edit' , ['credit'=> CreditAlliances::findOrFail($id)]);
    }

    public function updateAlliance(Request $request, $id)
    {
        $credits =CreditAlliances::findOrFail($id);
        $data = $request->only(['title', 'contacts']);
        $credits->update($data);
        dd($credits);
        return response()->json(['status' => 1], 202);

    }
}
