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
    protected $table = 'regions';

    protected $fillable = [
        'id',
        'region_name'
    ];

}