<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'agroyard_locality';

    protected $fillable = [
        'id',
        'name',
        'region_id',
        'area_id',
        'type',
        'slug'
    ];
}
