<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUsers extends Model
{
    protected $table = 'agroyard_company_users';

    protected $with = ['company'];

    public function users()
    {
        return $this->hasMany(AgroUser::class, 'id', 'user_id');
    }

    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }
}
