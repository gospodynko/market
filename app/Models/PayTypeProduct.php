<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayTypeProduct extends Model
{
    protected $table = 'pay_type_product';
    protected $fillable = ['pay_type_id', 'product_id'];
    protected $with = ['pay'];

    public function pay()
    {
        return $this->hasOne(PayType::class, 'id', 'pay_type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}