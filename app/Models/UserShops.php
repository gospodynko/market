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
    protected $_shops = [];

    public $shop_products;

    public $timestamps = false;

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
        $shops = $this->getShops();

        $orders = [];
        foreach ($shops as $shop) {
            foreach ($shop->products as $item) {
                foreach ($item->user_product_offers as $order) {
                    $orders[] = $order;
                }
            }
        }

        return $orders;
    }

    public function getProducts()
    {
        $this->getShops();

        foreach ($this->_shops as &$shop) {
            $shop->shop_products = $shop->products;
        }

        return $this->_shops;
    }

    public function getShops()
    {
        if (empty($this->_shops))
        {
            $companies_id = CompanyUsers::whereHas('company', function($q) {
                $q->where('companyRole', 'like', '%2%');
                $q->whereIn('status_id', [2, 3, 6]);
            })->where(['user_id' => \Auth::id()])->get()->pluck('company_id')->toArray();

            $this->_shops = self::whereIn('company_id', $companies_id)->get();
        }

        return $this->_shops;
    }
}
