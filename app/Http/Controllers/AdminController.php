<?php
namespace App\Http\Controllers;

use App\Models\DeliveryType;
use App\Models\PayType;
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

class AdminController extends Controller
{

    public function indexProducts(Request $request)
    {
        $products = Product::where('id', '>', '-1')
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
}
