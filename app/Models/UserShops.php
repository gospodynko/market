<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserShops extends Model
{

    protected $fillable = [
        'name',
        'rating',
        'company_id',
        'status'
    ];
    protected $appends = ['rate', 'url'];

    public $shops;

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (\Auth::user())
        {
            $companies_id = CompanyUsers::whereHas('company', function($q) {
                $q->where('companyRole', 'like', '%2%');
                $q->whereIn('status_id', [2, 3, 6]);
            })->where(['user_id' => \Auth::id()])->get()->pluck('company_id')->toArray();

            $this->shops = !empty($companies_id) ? UserShops::whereIn('company_id', $companies_id)->get() : [];
        }
    }

    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }

    public function companyUsers()
    {
        return $this->hasOne(CompanyUsers::class, 'company_id', 'company_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_shop_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRateAttribute()
    {
        return $this->products()->get()->avg('rate');
    }

    public function getUrlAttribute()
    {
        return 'shop/' . $this->slug;
    }

    public function getOrders()
    {
        $orders = [];
        foreach ($this->shops as $shop) {
            foreach ($shop->products as $item) {
                foreach ($item->user_product_offers as $order) {
                    $orders[] = $order;
                }
            }
        }

        return $orders;
    }

//    public function getOrdersCount()
//    {
//        $count = 0;
//        foreach ($this as $shop) {
//            foreach ($shop->products as $item) {
//                if (!empty($item->user_product_offers)) $count += $item->user_product_offers->count();
//            }
//        }
//
//        return $count;
//    }
}
