<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    public static function getArrayData(){
        return DeliveryType::select('id', 'name')->get();
    }
}
