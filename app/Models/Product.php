<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Antvel\Product\Models\Concerns\Pictures;
use App\Models\UserProduct;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{

    use Pictures;
    protected $fillable = ['moderation'];
    protected $appends = ['images'];
    protected $with = ['user_products'];

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

    public function getImagesAttribute()
    {
        $imagesPath = "products/$this->id/images/";

        $images = Storage::disk('public')->files($imagesPath);

        foreach ($images as $key => $image) {
            $images[$key] = Storage::disk('public')->url($image);
        }

        return $images;
    }

    public function user()
    {
        return $this->hasOne(AgroUser::class, 'id', 'created_by');
    }

}
