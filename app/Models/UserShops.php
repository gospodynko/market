<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserShops extends Model
{
    protected $fillable = [
        'name',
        'rating',
        'company_id',
        'user_id'
    ];
    public $timestamps = false;
    protected $with = ['company'];

    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }
}
