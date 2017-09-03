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

    protected $with = ['user'];

    public function user()
    {
        return $this->hasOne(AgroUser::class, 'id', 'user_id');
    }
}
