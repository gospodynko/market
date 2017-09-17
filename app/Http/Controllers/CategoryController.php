<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug, $subSlug = false)
    {
        $per_page = 12;
        $currSlug = $subSlug?: $slug;
        $category = Category::with('parent')->where('slug', $currSlug)->first();
        if(!$category) return abort(404);
        $products = Product::where('category_id', $category->id)->whereHas('user_products');
        return view('category', ['data' => ['products' => $products->paginate($per_page), 'cat_name' => $category->name],'category' => $category]);
    }
}
