<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBuyers extends Model
{
    protected $table = 'product_buyers';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone'
    ];
    protected $with = ['emails'];

    public function emails()
    {
        return $this->hasOne(ProductBuyersEmails::class, 'buyer_id', 'id');
    }

    public function fullInfo()
    {
        $email = !empty($this->emails) ? $this->emails->email : '';
        return $this->first_name .' '. $this->last_name .' '. $this->phone .' '. $email;
    }
}
