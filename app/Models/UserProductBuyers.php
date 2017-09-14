<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProductBuyers extends Model
{
    protected $table = 'user_product_buyers';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone'
    ];
    protected $with = ['emails'];

    public function emails()
    {
        return $this->hasMany(UserProductBuyersEmails::class, 'buyer_id', 'id');
    }

}
