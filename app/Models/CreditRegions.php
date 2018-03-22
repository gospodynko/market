<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.03.18
 * Time: 13:35
 */

namespace App\Models;


use App\Eloquent\Model;

class CreditRegions extends Model
{
    public $timestamps = false;

    protected $table = 'agroyard_alliance_region';
    protected $fillable = [
        'region_name'
    ];

}