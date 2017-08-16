<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producer;
use Antvel\Categories\Models\Category;
use App\Helpers\ProductsHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function indexProducts(Request $request){
        $products = Product::where('id', '>', '-1')
            ->paginate(20);


        return view('dashboard.sections.products.index', [
            'products' => $products,
        ]);
    }
    public function indexProducers(Request $request){
        $producers = Producer::where('id', '>', '-1')
            ->paginate(20);


        return view('dashboard.sections.producers.index', [
            'producers' => $producers,
        ]);
    }

    public function storeProducer(Request $request){
        if (!$request->input('category_id') || in_array(NULL, $request->input('category_id'))) {
            return redirect()->back()
                ->withErrors(['category_id' => [trans('globals.error').' не обрано категорію']]);
        }

        $producer = new Producer();
        $producer->category_id = \GuzzleHttp\json_encode($request->input('category_id'));
        $producer->name = $request->input('name');
        $producer->created_by = \Auth::id();
        $producer->updated_by = \Auth::id();
        $producer->save();

        $message = '';
        Session::flash('message', trans('product.controller.saved_successfully').$message);

        return redirect('admin/producers');
    }
    public function editProducer($id){
        $producer = Producer::find($id);
        $arrayCategories = Category::actives()
            ->where('category_id', NULL)
            ->lightSelection()
            ->get()
            ->toArray();

        $categories = [
            '' => trans('product.controller.select_category'),
        ];


        //categories drop down formatted
        ProductsHelper::categoriesDropDownFormat($arrayCategories, $categories);

        $edit = true;

        return view('dashboard.sections.producers.create',
            compact('producer','categories', 'edit', 'productsDetails'));
    }
    public function createProducer(Request $request){
        $producer = Producer::find(-50);
        $arrayCategories = Category::actives()
            ->where('category_id', NULL)
            ->lightSelection()
            ->get()
            ->toArray();

        $categories = [
            '' => trans('product.controller.select_category'),
        ];


        //categories drop down formatted
        ProductsHelper::categoriesDropDownFormat($arrayCategories, $categories);

        $edit = false;

        return view('dashboard.sections.producers.create',
            compact('producer','categories', 'edit', 'productsDetails'));
    }

    public function updateProducer($id, Request $request){
        $producer = Producer::find($id);

        $producer->category_id = \GuzzleHttp\json_encode($request->input('category_id'));
        $producer->name = $request->input('name');
        $producer->created_by = \Auth::id();
        $producer->updated_by = \Auth::id();
        $producer->save();

        $message = '';
        Session::flash('message', trans('product.controller.saved_successfully').$message);

        return redirect('admin/producers/'.$id.'/edit');

    }

    public function getProducersList(Request $request){
        $category = Category::find($request->input('category_id'));
        return json_encode(\App\Models\Producer::select('id', 'name')->whereRaw('json_contains(category_id, \'"' . $category->category_id . '"\')')->get());
    }
    public function getProductsList(Request $request){
        return json_encode(\App\Models\Product::select('id', 'name')->where('producer_id', $request->input('producer_id'))->get());
    }
}
