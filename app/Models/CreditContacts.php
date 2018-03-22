<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22.03.18
 * Time: 9:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CreditContacts extends Model
{

    public $timestamps = false;

    protected $table = 'agroyard_alliance_region_contacts';
    protected $fillable = [
        'id_credit_region',
        'id_agro_alliance',
        'region_email'
    ];

    public function region()
    {
        return $this->hasMany(CreditRegions::class, 'id', 'id_credit_region');
    }

    public function alliance()
    {
        return $this->hasOne(CreditAlliances::class, 'id', 'id_agro_alliance');
    }

}