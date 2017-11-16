<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{

    protected $table = 'agroyard_companies';
    protected $with = ['region', 'districts', 'locality'];
    protected $appends = ['address'];

    public function company_users()
    {
        return $this->hasMany(CompanyUsers::class, 'company_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(AgroUser::class, 'agroyard_company_users', 'company_id', 'user_id');
    }

    public function region()
    {
        return $this->hasOne(Region::class, 'id', 'compFactAddress_1');
    }

    public function districts()
    {
        return $this->hasOne(Region::class, 'id', 'compFactAddress_2');
    }

    public function locality()
    {
        return $this->hasOne(Region::class, 'id', 'compFactAddress_3');
    }

    public function getAddressAttribute()
    {
        return $this->region->name . ' обл., м. ' . with($this->locality ?: $this->districts)->name . ', ' . $this->compFactAddress_4;
    }
}
