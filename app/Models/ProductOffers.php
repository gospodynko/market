<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOffers extends Model
{
    protected $table = 'product_offers';
    protected $fillable = [
        'product_id',
        'buyer_id',
        'day_start',
        'day_end',
        'price',
        'quantity',
        'comment',
        'delivery_type_id',
        'pay_type_id',
        'buyer_email_id'
    ];

    protected $with = ['product', 'buyer', 'delivery', 'payment', 'email'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


    public function buyer()
    {
        return $this->hasOne(ProductBuyers::class, 'id', 'buyer_id');
    }

    public function payment()
    {
        return $this->hasOne(PayType::class, 'id', 'pay_type_id');
    }

    public function delivery()
    {
        return $this->hasOne(DeliveryType::class, 'id', 'delivery_type_id');
    }

    public function email()
    {
        return $this->hasOne(ProductBuyersEmails::class, 'id', 'buyer_email_id');
    }

}
