<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $q = '%' . $request->input('q') . '%';
        $products = Product::where('name', 'like', $q)->orWhere('description', 'like', $q)->get();

        return response()->json($products, 200);
    }
}
