<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryType;
use Antvel\Product\Models\Concerns\Pictures;
use Illuminate\Support\Facades\Validator;

class Product extends Model
{

    use Pictures {
        getDefaultPictureAttribute as getDefaultPicture;
    }

    protected $with = ['pictures', 'user_shop', 'reviews'];
    protected $fillable = ['category_id', 'price', 'currency_id', 'delivery_id', 'pay_id', 'created_by', 'updated_by', 'user_shop_id', 'sale_counts', 'view_counts', 'status', 'created_at', 'producer_id', 'quantity_price',];
    protected $appends = ['default_picture', 'rate', 'url'];
    public static $onlyActive = true;

    public static function scopeActive($query)
    {
        return $query->whereHas('user_shop', function ($query) {
                $query->where('status', 1);
            });
    }

    public function newQuery()
    {
        $query = parent::newQuery();

        if (self::$onlyActive === true) {
            $query->active();
        }

        return $query;
    }

    public function user_shop()
    {
        return $this->hasOne(UserShops::class, 'id', 'user_shop_id');
    }

    public function parent_product()
    {
        return $this->hasOne(self::class, 'id', 'parent_product_id');
    }

    public function getIsRootAttribute()
    {
        return $this->parent_product_id === null;
    }

    public function getOtherProductsAttribute()
    {
        return $this->is_root ? self::where('parent_product_id', $this->id)->get() : self::where('parent_product_id', $this->parent_product_id)->orWhere('id', $this->parent_product_id)->get()->where('id', '!=', $this->id);
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
        return $this->hasMany(ProductReviews::class, 'product_id', 'id')->where('parent_review_id', null)->orderBy('created_at', 'DESC');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRateAttribute()
    {
        return (int) $this->reviews->avg('rate');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->slug = $this->id . '-' . str_slug($value);
    }

    public static function scopeBySlugs($query, $market, $product)
    {
        return $query->where('slug', $product)->whereHas('user_shop', function ($query) use ($market) {
                $query->where('slug', $market);
            });
    }

    public static function validateFilters($input)
    {
        $rules = array(
            'category_id' => 'array',
            'category_id.*' => 'numeric',
            'order_by' => 'in:price,created_at',
            'order_by_type' => 'required_with:order_by|in:asc,desc',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return response()->json(['message' => 'validation error', 'error' => $validation->getMessageBag()->toArray()], 422);
        }

        return response()->json(['message' => 'success'], 200);
    }

    public static function scopeApplyFilters($query, $filters)
    {
        if (array_key_exists('category_id', $filters) && count($filters['category_id']) > 0) {
            $query->whereIn('category_id', $filters['category_id']);
        }

        if (array_key_exists('order_by', $filters)) {
            $query->orderBy($filters['order_by'], $filters['order_by_type']);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query;
    }

    public function getDefaultPictureAttribute()
    {
        if ($this->parent_product_id === null) {
            return $this->getDefaultPicture();
        } else {
            return $this->parent_product->default_picture;
        }
    }

    public function getUrlAttribute()
    {
        return $this->user_shop->url . '/' . $this->slug;
    }
}
