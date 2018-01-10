<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayType extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug'
    ];
    public static function getArrayData(){
        return PayType::select('id', 'name')->get();
    }
}
