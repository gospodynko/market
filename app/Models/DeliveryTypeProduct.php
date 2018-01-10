<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryTypeProduct extends Model
{
    protected $table = 'delivery_type_product';
    protected $fillable = ['delivery_type_id', 'product_id'];
    protected $with = ['delivery'];
    public $timestamps = false;

    public function delivery()
    {
        return $this->hasOne(DeliveryType::class, 'id', 'delivery_type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}