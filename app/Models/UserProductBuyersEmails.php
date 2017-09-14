<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProductBuyersEmails extends Model
{
    protected $table = 'user_product_buyers_emails';
    protected $fillable = [
      'email',
    ];
    public $timestamps = false;

}
