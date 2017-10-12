<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserShops extends Model
{
    protected $fillable = [
        'name',
        'rating',
        'company_id',
        'status'
    ];
    public $timestamps = false;
    protected $with = ['companyUsers'];

    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }

    public function companyUsers()
    {
        return $this->hasOne(CompanyUsers::class, 'company_id', 'company_id');
    }
}
