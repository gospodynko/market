<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Antvel\Categories\Models\Category;

class Producer extends Model
{
    protected $fillable = [
        'name',
        'category_id'
    ];

    public function getCategories(){
        $output = [];
        $tmp = Category::select('id', 'name')
            ->whereIn('id', \GuzzleHttp\json_decode($this->category_id))->get()->toArray();
        foreach ($tmp AS $item)
            $output[$item['id']] = $item['name'];
        return $output;
    }

    public static function getByCategory($categorId){
        $output = [];
        $category = Category::find($categorId);
        foreach (Producer::select('id', 'name')->whereRaw('json_contains(category_id, \'"' . $category->category_id . '"\')')->get() AS $item)
            $output[$item->id] = $item->name;
        return $output;
    }
}
