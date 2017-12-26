<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProductOffers extends Model
{
    protected $table = 'user_product_offers';

    public function buyer()
    {
        return $this->hasOne(ProductBuyers::class, 'id', 'buyer_id');
    }
}
