<?php
namespace App\Http\Controllers;

use App\Http\Requests\ValidationProduct;
use App\Models\Category;
use App\Models\CompanyUsers;
use App\Models\Currency;
use App\Models\DeliveryType;
use App\Models\PayType;
use App\Models\Producer;
use App\Models\Product;
use App\Models\UserProduct;
use App\Models\UserShops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserShopController extends Controller
{

    private static $validationRules = [
        'category_id' => 'required|exists:categories,id',
        'producer_id' => 'sometimes|exists:producers,id',
        'product_id' => 'sometimes|exists:products,id',
        'price' => 'sometimes|numeric',
        'name' => 'sometimes|string|max:250',
        'description' => 'sometimes|string|max:65000',
        'features.*.name' => 'string|max:50',
        'features.*.params.*.title' => 'string|max:50',
        'features.*.params.*.param' => 'string|max:50',
        'user_shop_id' => 'sometimes|exists:user_shops,id',
        'currency_id' => 'sometimes|exists:currencies,id',
        'slug' => 'string|max:250',
        'quantity_price' => 'string|max:100'
    ];

    public function getShops(UserShops $shops)
    {
        $shops = $shops->shops;

        return view('user_shop.shops.index', compact('shops'));
    }

    public function createProduct($id)
    {
        return view('user_shop.shops.create', ['data' => ['shop' => UserShops::find($id),
                'categories' => Category::with('producers.products')->get(),
                'currencies' => Currency::all(), 'delivery_type' => DeliveryType::all(),
                'pay_type' => PayType::all()]]);
    }

    public function getShopOrders(UserShops $shops)
    {
        $userShops = $shops->shops;
        $orders = $shops->getOrders();

        return view('user_shop.shops.orders', compact('userShops', 'orders'));
    }
    public function storeProduct(ValidationProduct $request)
    {
        $producer = $request->input('producer');
        $category = $request->input('category');
        $shop_id = $request->input('shop_id');

        //.validate user_shop_id
        $shop = UserShops::findOrFail($shop_id);
        if(!$shop->companyUsers()->where('user_id', Auth::id())->get()) {
            return abort(400);
        }

        if (!is_numeric($producer['id'])) {
            $producer_id = self::createProducer($producer, $category);

            if (!is_int($producer_id)) {
                return $producer_id;
            }
        } else {
            $producer_id = $producer['id'];
        }

        if ($producer_id) {
            $data = $request->only([
                'product',
                'category',
                'description',
                'delivery_type',
                'pay_type',
                'images',
                'features',
                'shop_id',
                'price',
                'currency'
            ]);
            self::createProductSeller($data, $producer_id);
        }
    }

    private function createProducer($producer, $category)
    {
        $check_producer = Producer::where('name', $producer['name'])->first();
        if ($check_producer) {
            return $check_producer->id;
        } else {
            $data_producer = [
                'name' => $producer['name'],
                'created_by' => \Auth::id(),
                'updated_by' => \Auth::id(),
                'category_id' => $category['id']
            ];

            $v = Validator::make($data_producer, self::$validationRules);
            if ($v->fails()) {
                return response()->json($v->errors(), 422);
            }

            $producer_id = Producer::create($data_producer);
            $producer_id->categories()->sync($category['id']);
            return $producer_id->id;
        }
    }

    private function createProductSeller($data, $producer_id)
    {
        $data_product = [
            'name' => $data['product']['name'] . rand(1,25),
            'description' => $data['description'],
            'price'=> $data['price'],
            'created_by' => \Auth::id(),
            'updated_by' => \Auth::id(),
            'category_id' => $data['category']['id'],
            'currency_id' => $data['currency']['id'],
            'delivery_id' => 111,
            'pay_id' => 111,
            'user_shop_id' => $data['shop_id'],
            'bar_code' => '777',
            'producer_id' => $producer_id,
            'moderation' => 1,
            'status' => 0,
            'features' => json_encode($data['features']),
            'slug' => str_slug($data['product']['name'] . rand(1,25))
        ];

        $product = Product::create($data_product);
        $product->updatePictures($data['images']);
        $delivery_ids = array_map(function ($obj) { return $obj['id']; }, $data['delivery_type']);
        $pay_ids = array_map(function ($obj) { return $obj['id']; }, $data['pay_type']);
        $product->pay_types()->attach($pay_ids);
        $product->delivery_types()->attach($delivery_ids);
    }

    private function createUserProduct($product_id, $category_id, $producer_id, $price, $shop_id, $currency, $pay_types, $delivery_types, $quantity_price)
    {
        $data_user_product = [
            'category_id' => $category_id,
            'product_id' => $product_id,
            'producer_id' => $producer_id,
            'user_shop_id' => $shop_id,
            'price' => $price,
            'currency_id' => $currency['id'],
            'created_by' => \Auth::id(),
            'updated_by' => \Auth::id(),
            'delivery_id' => '111',
            'pay_id' => '111',
            'quantity_price' => $quantity_price
        ];


        $v = Validator::make($data_user_product, self::$validationRules);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $user_product = UserProduct::create($data_user_product);
        $user_product->delivery_types()->sync($delivery_types);
        $user_product->pay_types()->sync($pay_types);
        $mainProduct = Product::find($user_product->product_id);

        $minPrice = \DB::table('user_products')
            ->where('status', 1)
            ->where('product_id', $user_product->product_id)
            ->min('price');

        $maxPrice = \DB::table('user_products')
            ->where('status', 1)
            ->where('product_id', $user_product->product_id)
            ->max('price');

        $mainProduct->price_min = ($minPrice > $user_product->price) ? $user_product->price : $minPrice;
        $mainProduct->price_max = ($maxPrice < $user_product->price) ? $user_product->price : $maxPrice;

        $mainProduct->status = 1;

        $mainProduct->save();
    }

    public function loadProducts(UserShops $shop, Request $request)
    {
        $filters = $request->input();

        $validation = Product::validateFilters($filters);
        if (!$validation->isSuccessful()) {
            return $validation;
        }

        $products = $shop->products()->applyFilters($filters)->paginate(6);
        return $products;
    }

    public function getShopPage(UserShops $shop)
    {
        $shop->load('company');
        $categories = Category
            ::where('parent_category_id', null)
            ->whereHas('children.products', function ($query) use ($shop) {
                $query->where('user_shop_id', $shop->id);
            })
            ->with(['children.products' => function ($query) use ($shop) {
                    $query->where('user_shop_id', $shop->id);
                }])
            ->get()
        ;

        foreach ($categories as $category) {
            foreach ($category->children as $key => $child) {
                $child->products_count = $child->products()->where('user_shop_id', $shop->id)->count();
                if ($child->products_count === 0) {
                    $category->children->forget($key);
                }
            }
        }

        $products = $shop->products()->paginate(6);

        return view('user_shop.shops.show', compact('shop', 'categories', 'products'));
    }
}
