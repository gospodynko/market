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
            $sort = ['type' => 'price', 'sort' => 'DESC'];
        } else {
            $sort = ['type' => 'price', 'sort' => 'ASC'];
        }
        $products = Product::where([['name', 'like', $q], ['status', '=', 1]])
                                        ->orWhere('description', 'like', $q)
                                        ->whereHas('user_shop', function ($q){
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
            $filter_type = ['type' => 'price', 'sort' => 'DESC'];
        } else {
            $filter_type = ['type' => 'price', 'sort' => 'ASC'];
        }

        $q = '%' . $request->input('q') . '%';
        $products = Product::where([['name', 'like', $q], ['status', '=', 1]])
                            ->orWhere('description', 'like', $q)
                            ->whereHas('user_shop', function ($q){
                                $q->where('status', 1);
                            })
                            ->orderby($filter_type['type'], $filter_type['sort'])
                            ->paginate($page_count);

        return response()->json(['products' => $products], 200);
    }
}
