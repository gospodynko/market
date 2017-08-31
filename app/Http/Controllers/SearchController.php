<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $page_count = 20;
        $q = '%' . $request->input('q') . '%';
        $products = Product::where('name', 'like', $q)->orWhere('description', 'like', $q)->paginate($page_count);

        return view('search',['data' => ['products' => $products, 'q' => $request->input('q')]]);
    }

    public function search(Request $request)
    {
        $q = '%' . $request->input('q') . '%';
        $products = Product::where('name', 'like', $q)->orWhere('description', 'like', $q)->get();

        return response()->json($products, 200);
    }
}
