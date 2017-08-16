<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayType extends Model
{
    public static function getArrayData(){
        return PayType::select('id', 'name')->get();
    }
}
