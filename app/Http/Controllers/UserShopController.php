<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\DeliveryType;
use App\Models\PayType;
use App\Models\Producer;
use App\Models\Product;
use App\Models\UserProduct;
use App\Models\UserShops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserShopController extends Controller
{
    public function getShops()
    {
        return view('user_shop.shops.index', ['shops' => UserShops::all()]);
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
        $pay_type = $request->input('pay_type');
        $delivery_type = $request->input('delivery_type');
        $images = $request->input('images');
        $features = $request->input('features');

        if(!is_numeric($producer['id'])){
            $producer_id  = self::createProducer($producer, $category);
        } else {
            $producer_id = $producer['id'];
        }
        if(!is_numeric($product['id']) && $producer_id && $product_desc){
            $product_id = self::createProductSeller($product, $category, $producer_id, $product_desc, $images, $features);
        } else {
            $product_id = $product['id'];
        }
        if($producer_id && $product_id){
            $user_product = self::createUserProduct($product_id, $category['id'], $producer_id, $price, $shop_id, $currency, $pay_type, $delivery_type);
            dd($user_product);
        }
    }

    private function createProducer($producer, $category)
    {
        $check_producer = Producer::where('name', $producer['name'])->first();
        if($check_producer){
            return $check_producer->id;
        } else {
            $data_producer = [
                'name' => $producer['name'],
                'created_by' => \Auth::id(),
                'updated_by' => \Auth::id(),
                'category_id' => $category['id']
            ];
            $producer_id = Producer::create($data_producer);
            $producer_id->categories()->sync($category['id']);
            return $producer_id->id;
        }

    }

    private function createProductSeller($product, $category, $producer_id, $product_desc, $images, $features)
    {
        $check_product = Product::where('name', $product['name'])->first();
        if($check_product){
            return $check_product->id;
        } else {
            $product_id = Product::create([
                'name' => $product['name'],
                'description' => $product_desc,
                'created_by' => \Auth::id(),
                'updated_by' => \Auth::id(),
                'category_id' => $category['id'],
                'bar_code' => '777',
                'producer_id' => $producer_id,
                'moderation' => 1,
                'status' => 0,
                'features' => json_encode($features)
            ]);
            $product_id->updatePictures($images);
            return $product_id->id;
        }
    }

    private function createUserProduct($product_id, $category_id, $producer_id, $price, $shop_id, $currency, $pay_type, $delivery_type)
    {
        $data_user_product = [
            'category_id' => $category_id,
            'product_id' => $product_id,
            'producer_id' => $producer_id,
            'user_shop_id' => $shop_id,
            'price' => $price,
            'currency_id' => $currency['id'],
            'pay_id' => $pay_type[0]['id'],
            'delivery_id' => $delivery_type[0]['id'],
            'created_by' => \Auth::id(),
            'updated_by' => \Auth::id()
        ];
        $user_product = UserProduct::create($data_user_product);
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
}
