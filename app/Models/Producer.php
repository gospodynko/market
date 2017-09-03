<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{

    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'producer_id', 'id');
    }
}
