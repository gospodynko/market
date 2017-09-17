<?php

namespace App\Models;

use Antvel\Categories\Models\Category as AntvelCategory;
use App\Events\CategoryEvent;

class Category extends AntvelCategory
{

    protected $with = ['children', 'producers'];
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'icon',
        'image',
        'status',
        'type',
        'slug'
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'category_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'category_id');
    }

    public function producers()
    {
        return $this->belongsToMany(Producer::class);
    }

}
