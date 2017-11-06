<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{

    public function index($slug, $subSlug = false)
    {
        $per_page = 12;

        if (!$subSlug) {
            $category = Category::where('slug', $slug)->first();
            $categories = $category->children()->orWhere('id', $category->id);
        } else {
            $categories = Category::where('slug', $subSlug);
        }
        $products = Product::whereIn('category_id', $categories->pluck('id'));

        return view('category', ['data' => ['products' => $products->paginate($per_page), 'cat_name' => $category->name], 'category' => $category]);
    }
}
