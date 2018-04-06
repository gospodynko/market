<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.04.18
 * Time: 15:07
 */

namespace App\Http\Controllers;

use App\Models\UserShops;

use Illuminate\Http\Request;
use App\Http\Requests\ShopValidation;
use Illuminate\Support\Facades\Validator;


class EditShopController extends Controller
{
    public function getShopList(UserShops $shops)
    {
        $shops = $shops->getShops();
        return view('user_shop.shops.all-user-shops', compact('shops'));
    }

    public function editShopInfo($id){
        $shop = UserShops::findOrFail($id);
        return view('user_shop.shops.update_shop', compact('shop'));
    }

    public function updateShopInfo(ShopValidation $request, $id){
        $shop = UserShops::findOrFail($id);
        $data = $request->only(['name']);
        $shop->update($data);
        return view('user_shop.shops.update_shop', compact('shop'));
    }

    public function updatePicture($id, Request $request) {
        $v = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if (count($v->errors())) {
            return response()->json(['status' => 0], 400);
        }
        $shop = UserShops::findOrFail($id);
        $file = $request->file('image');

        $path = '/public/img/shop-logo/';
        if ($file->move(base_path($path),$file->getClientOriginalName())) {
            $shop->logo = '/img/shop-logo/' . $file->getClientOriginalName();
            $shop->save();
            return response()->json([], 201);
        }

        return response()->json(['status' => 0], 400);

    }

    public function removeImage($id, Request $request)
    {
        try {
            $shop = UserShops::findOrFail($id);
            $shop->logo = '';
            $shop->save();
            return response()->json([], 202);
        } catch (\ErrorException $e) {
            return response()->json(['status' => 0], 400);
        }
    }

}