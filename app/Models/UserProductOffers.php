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
        'comment'
    ];

    protected $with = ['userProduct', 'buyer'];

    public function userProduct()
    {
        return $this->hasOne(UserProduct::class, 'id', 'user_product_id');
    }

    public function buyer()
    {
        return $this->hasOne(AgroUser::class, 'id', 'buyer_id');
    }

}
