<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\DB;
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

    public function getShops()
    {
//        dd(DB::table('agroyard_company_users')->where('user_id', Auth::id())->get());
        $companies_id = CompanyUsers::whereHas('company', function($q){
            $q->where('companyRole', 'like', '%2%');
            $q->whereIn('status_id', [2,3,6]);
        })->where(['user_id' => Auth::id()])->get()->pluck('company_id')->toArray();
        return view('user_shop.shops.index', ['shops' => UserShops::whereIn('company_id', $companies_id)->get()]);
    }

    public function createProduct($id)
    {
        return view('user_shop.shops.create', ['data' => ['shop' => UserShops::find($id),
                'categories' => Category::with('producers.products')->get(),
                'currencies' => Currency::all(), 'delivery_type' => DeliveryType::all(),
                'pay_type' => PayType::all()]]);
    }

    public function storeProduct(Request $request)
    {

        $producer = $request->input('producer');
        $category = $request->input('category');
        $product = $request->input('product');
        $product_desc = $request->input('description');
        $price = $request->input('price');
        $shop_id = $request->input('shop_id');
        $currency = $request->input('currency');
        $pay_types = $request->input('pay_type');
        $delivery_types = $request->input('delivery_type');
        $images = $request->input('images');
        $features = $request->input('features');
        $quantity_price = $request->input('quantity_price');

        if (!is_numeric($producer['id'])) {
            $producer_id = self::createProducer($producer, $category);

            if (!is_int($producer_id)) {
                return $producer_id;
            }
        } else {
            $producer_id = $producer['id'];
        }
        if (!is_numeric($product['id']) && $producer_id && $product_desc) {
            $product_id = self::createProductSeller($product, $category, $producer_id, $product_desc, $images, $features);

            if (!is_int($product_id)) {
                return $product_id;
            }
        } else {
            $product_id = $product['id'];
        }
        if ($producer_id && $product_id && $shop_id) {
            return self::createUserProduct($product_id, $category['id'], $producer_id, $price, $shop_id, $currency, array_column($pay_types, 'id'), array_column($delivery_types, 'id'), $quantity_price);

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

    private function createProductSeller($product, $category, $producer_id, $product_desc, $images, $features)
    {
        $check_product = Product::where('name', $product['name'])->first();
        if ($check_product) {
            return $check_product->id;
        } else {
            $data_product = [
                'name' => $product['name'],
                'description' => $product_desc,
                'created_by' => \Auth::id(),
                'updated_by' => \Auth::id(),
                'category_id' => $category['id'],
                'bar_code' => '777',
                'producer_id' => $producer_id,
                'moderation' => 1,
                'status' => 0,
                'features' => json_encode($features),
                'slug' => str_slug($product['name'])
            ];

            $v = Validator::make($data_product, self::$validationRules);
            if ($v->fails()) {
                return response()->json($v->errors(), 422);
            }

            $product_id = Product::create($data_product);
            $product_id->updatePictures($images);
            return $product_id->id;
        }
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
    
    public function getShopPage(UserShops $shop) {
        dd($shop->products()->groupBy('category_id')->selectRaw('count(id)')->toSql());
    $shop->load('products');
        dd($shop->toArray());
    }
}
