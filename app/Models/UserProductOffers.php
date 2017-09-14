<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProductOffers extends Model
{
    protected $table = 'user_product_offers';
    protected $fillable = [
        'user_product_id',
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

    protected $with = ['userProduct', 'buyer', 'delivery', 'payment', 'email'];

    public function userProduct()
    {
        return $this->hasOne(UserProduct::class, 'id', 'user_product_id');
    }


    public function buyer()
    {
        return $this->hasOne(UserProductBuyers::class, 'id', 'buyer_id');
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
        return $this->hasOne(UserProductBuyersEmails::class, 'id', 'buyer_email_id');
    }

}
