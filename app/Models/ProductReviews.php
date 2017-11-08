<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{

    protected $table = 'product_reviews';
    protected $fillable = [
        'user_id',
        'text',
        'product_id'
    ];
    protected $with = ['user', 'answers'];

    public function user()
    {
        return $this->hasOne(AgroUser::class, 'id', 'user_id');
    }

    public function parent_review()
    {
        return $this->hasOne(self::class, 'id', 'parent_review_id');
    }

    public function answers()
    {
        return $this->hasMany(self::class, 'id', 'parent_review_id');
    }
}
