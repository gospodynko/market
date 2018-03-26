<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.03.18
 * Time: 15:38
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditAlliances extends Model
{
    public $timestamps = false;

    protected $table = 'agroyard_alliance';
    protected $fillable = [
        'id',
        'title',
        'contacts'
    ];

    public function branches()
    {
        return $this->hasMany(CreditContacts::class, 'id_agro_alliance', 'id');
    }
}