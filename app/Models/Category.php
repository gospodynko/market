<?php

namespace App\Models;

use Antvel\Categories\Models\Category as AntvelCategory;

class Category extends AntvelCategory
{

    protected $with = ['children'];

    public function children()
    {
        return $this->hasMany(self::class, 'category_id', 'id');
    }
}
