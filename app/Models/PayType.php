<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayType extends Model
{

    protected $fillable = [
        'name',
        'slug'
    ];
    public static function getArrayData(){
        return PayType::select('id', 'name')->get();
    }
}
