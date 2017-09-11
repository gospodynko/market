<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Antvel\Product\Models\Concerns\Pictures;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{

    use Pictures;
    protected $fillable = [
        'moderation',
        'category_id',
        'created_by',
        'updated_by',
        'name',
        'description',
        'price',
        'cost',
        'stock',
        'features',
        'barcode',
        'condition',
        'rate_val',
        'tags',
        'brand',
        'rate_count',
        'low_stock',
        'status',
        'parent_id',
        'producer_id',
        'slug'
    ];
    protected $appends = ['default_picture'];
    protected $with = ['user_products', 'pictures', 'reviews'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function user_products()
    {
        return $this->hasMany(UserProduct::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(AgroUser::class, 'id', 'created_by');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReviews::class, 'product_id', 'id')->orderBy('created_at', 'DESC');
    }


}
