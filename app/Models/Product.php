<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryType;
use Antvel\Product\Models\Concerns\Pictures;

class Product extends Model
{

    use Pictures;

    protected $with = ['user_shop', 'pay_types', 'delivery_types', 'reviews', 'pictures'];
    protected $fillable = ['product_id', 'category_id', 'price', 'currency_id', 'delivery_id', 'pay_id', 'created_by', 'updated_by', 'user_shop_id', 'sale_counts', 'view_counts', 'status', 'created_at', 'producer_id', 'quantity_price',];
    protected $appends = ['default_picture'];

    public function user_shop()
    {
        return $this->hasOne(UserShops::class, 'id', 'user_shop_id');
    }

    public function parent_product()
    {
        return $this->hasOne(self::class);
    }

    public function getIsRootAttribute() {
        return $this->parent_product_id === null;
    }
    
    public function getOtherProductsAttribute()
    {
        return $this->is_root 
            ? self::where('parent_product_id', $this->id)->get() 
            : self::where('parent_product_id', $this->parent_product_id)->orWhere('id', $this->parent_product_id)->get()->where('id', '!=', $this->id);
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

    public function reviews()
    {
        return $this->hasMany(ProductReviews::class, 'product_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
