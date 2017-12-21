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

    public function getOrdersCount()
    {
        $count = 0;
        foreach ($this->products as $item) {
            if (!empty($item->user_product_offers)) $count += $item->user_product_offers->count();
        }

        return $count;
    }

    public function getProductsCount()
    {
        $count = 0;
        if (!empty($this->products)) $count = $this->products->count();

        return $count;
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

    public function getShopProductDetails($shop_id)
    {
        $this->getShops();

        $products = [];
        foreach ($this->_shops as $item) {
            if ($item->id == $shop_id)
            {
                $products = $item->products;
                break;
            }
        };

        return $products;
    }

    public function getOrdersDetails($order_id)
    {
        $this->getOrders();

        $orders = [];
        foreach ($this->_shops as $item) {
            if ($item->id == $order_id)
            {
               foreach ($item->products as $product)
                   foreach ($product->user_product_offers as $offer){
                       $orders[] = [
                           'id' => $offer->id,
                           'date' => $offer->created_at,
                           'buyer' => $offer->buyer,
                           'name' => $product->name,
                           'link' => $product->getUrl(),
                           ];
                   }
               }
            }


        return $orders;
    }
}
