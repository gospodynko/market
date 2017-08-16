<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
      'name'
    ];

    public static function getArray(){
        $out = [];
        foreach (Currency::select('id', 'name')->get() AS $currency)
            $out[$currency->id] = $currency->name;

        return $out;
    }
}
