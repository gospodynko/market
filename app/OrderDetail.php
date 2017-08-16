<?php

namespace App;

/*
 * Antvel - Order Detail Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Eloquent\Model;
use App\Models\UserProduct;

class OrderDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'status',
        'delivery_date',
        'rate',
        'rate_comment',
    ];

    protected $appends = ['product'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function getProductAttribute()
    {
        return $this->belongsTo(UserProduct::class, 'product_id', 'id')->first();
    }

    public function product(){
        return $this->hasOne('App\Models\UserProduct', 'id', 'product_id');
    }
}
