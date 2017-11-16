<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBuyersEmails extends Model
{
    protected $table = 'product_buyers_emails';
    protected $fillable = [
      'email',
    ];
    public $timestamps = false;

}
