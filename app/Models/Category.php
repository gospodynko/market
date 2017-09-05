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
    protected $events = [
        'updated' => CategoryEvent::class,
        'saved' => CategoryEvent::class,
        'created' => CategoryEvent::class,

    ];

    public function children()
    {
        return $this->hasMany(self::class, 'category_id', 'id');
    }

    public function producers()
    {
        return $this->belongsToMany(Producer::class);
    }

}
