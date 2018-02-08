<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{

    public function index($slug, $subSlug = false)
    {
        $per_page = 12;
        $category = Category::where('slug', $slug)->first();

        if (!$subSlug) {
            $categories = $category->children()->orWhere('id', $category->id);
        } else {
            $categories = Category::where('slug', $subSlug);
        }
        $products = Product::where('status', 1)->whereIn('category_id', $categories->pluck('id'))->orderBy('created_at', 'DESC');

        return view('category', ['data' => ['products' => $products->paginate($per_page), 'cat_name' => $category->name], 'category' => $category]);
    }

    public function categoryFilter($slug)
    {
        $category = Category::where('parent_category_id', null)->get();
        return view('shop-list', ['data' => ['category' => $category]]);
    }
}
