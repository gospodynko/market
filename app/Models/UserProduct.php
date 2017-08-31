<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryType;

class UserProduct extends Model
{

    protected $with = ['created_by_user'];
    protected $fillable = [
        'product_id',
        'category_id',
        'price',
        'currency_id',
        'delivery_id',
        'pay_id',
        'created_by',
        'user_shop_id',
        'sale_counts',
        'view_counts',
        'status',
        'created_at',
        'producer_id'
    ];

    public function shop()
    {
        return $this->hasMany(UserShops::class, 'id', 'user_shop_id');
    }

    public function mainProduct()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function pictures()
    {
        return $this->mainProduct->pictures;
    }

    public function getDeliveryArray()
    {
        $out = [];
        $deliveryTypes = DeliveryType::select('id', 'name')->whereIn('id', array_values(\GuzzleHttp\json_decode($this->delivery_id)))->get();
        foreach ($deliveryTypes AS $deliveryType)
            $out[$deliveryType->id] = $deliveryType->name;

        return $out;
    }

    public function getPayArray()
    {
        $out = [];
        $deliveryTypes = PayType::select('id', 'name')->whereIn('id', array_values(\GuzzleHttp\json_decode($this->pay_id)))->get();
        foreach ($deliveryTypes AS $deliveryType)
            $out[$deliveryType->id] = $deliveryType->name;

        return $out;
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
}
