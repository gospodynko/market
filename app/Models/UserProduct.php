<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryType;

class UserProduct extends Model
{

    protected $with = ['shop', 'pay_types', 'delivery_types', 'user'];
    protected $fillable = [
        'product_id',
        'category_id',
        'price',
        'currency_id',
        'delivery_id',
        'pay_id',
        'created_by',
        'updated_by',
        'user_shop_id',
        'sale_counts',
        'view_counts',
        'status',
        'created_at',
        'producer_id',
        'quantity_price'
    ];

    public function shop()
    {
        return $this->hasOne(UserShops::class, 'id', 'user_shop_id');
    }

    public function mainProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function pictures()
    {
        return $this->mainProduct->pictures;
    }

    public function delivery_types()
    {
        return $this->belongsToMany(DeliveryType::class);
    }

    public function pay_types()
    {
        return $this->belongsToMany(PayType::class);
    }

    public function currency()
    {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

    public function getPrice()
    {
        $price = \App\Helpers\CurrencyRates::convertToUAH($this->price, $this->currency_id);
        return number_format($price, 2, '.', '');
    }

    public function getCompanyName()
    {
        $userId = $this->created_by;
        $res = \DB::select(\DB::raw("SELECT ac.id, ac.companyRole, ac.compName FROM agroyard_companies AS ac, agroyard_company_users AS acu 
                                  WHERE ac.id = acu.company_id AND acu.user_id={$userId} "));
        foreach ($res AS $item) {
            if (strpos($item->companyRole, '2')) {
                return $item->compName;
            }
        }
    }

    public function user()
    {
        return $this->hasOne(AgroUser::class, 'id', 'created_by');
    }
}
