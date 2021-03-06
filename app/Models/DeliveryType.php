<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug'
    ];
    public static function getArrayData(){
        return DeliveryType::select('id', 'name')->get();
    }
}
