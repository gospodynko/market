<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Auth;

class UsersProductsController extends Controller
{
    protected $panel = [
        'center' => ['width' => '10'],
        'left' => ['width' => '2'],
    ];

    public function index(Request $request){

        $user = Auth::user();

        $products = UserProduct::where('created_by', '=', $user->id)
            ->paginate(20);
        return view('user.myProducts', [
            'products' => $products,
            'panel' => $this->panel,
        ]);
    }
}
