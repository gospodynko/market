<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $page_count = 12;
        $q = '%' . $request->input('q') . '%';
        $sort = $request->input('sort');
        if($sort == 'max'){
            $sort = ['type' => 'price_min', 'sort' => 'DESC'];
        } else if($sort == 'min'){
            $sort = ['type' => 'price_min', 'sort' => 'ASC'];
        } else {
            $sort = ['type' => 'rate_val', 'sort' => 'DESC'];
        }
        $products = Product::where(function ($query) use ($q){
                                $query->where('name', 'like', $q);
                                $query->orWhere('description', 'like', $q);
                            })
                            ->whereHas('user_products.shop', function ($q){
                                $q->where('status', 1);
                            })
                            ->orderby($sort['type'], $sort['sort'])
                            ->paginate($page_count);

        return view('search',['data' => ['products' => $products, 'q' => $request->input('q'), 'sort' => $request->input('sort')?:'min']]);
    }

    public function search(Request $request)
    {
        $page_count = 12;
        $filter_type = $request->input('sort');
        if($filter_type == 'plus'){
            $filter_type = ['type' => 'price_min', 'sort' => 'DESC'];
        } else if($filter_type == 'minus'){
            $filter_type = ['type' => 'price_min', 'sort' => 'ASC'];
        } else {
            $filter_type = ['type' => 'rate_val', 'sort' => 'DESC'];
        }

        $q = '%' . $request->input('q') . '%';
        $products = Product::where('name', 'like', $q)
                            ->orWhere('description', 'like', $q)
                            ->whereHas('user_products.shop', function ($q){
                                $q->where('status', 1);
                            })
                            ->orderby($filter_type['type'], $filter_type['sort'])
                            ->paginate($page_count);

        return response()->json(['products' => $products], 200);
    }
}
