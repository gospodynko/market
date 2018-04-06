<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.04.18
 * Time: 9:26
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MarketShopInfo extends Model
{
    protected $table = 'user_shops';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'logo'
    ];
    public $timestamps = false;

    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }
}