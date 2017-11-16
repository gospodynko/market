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
    protected $appends = ['rate', 'url'];
    public $timestamps = false;

    public function company()
    {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }

    public function companyUsers()
    {
        return $this->hasOne(CompanyUsers::class, 'company_id', 'company_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_shop_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRateAttribute()
    {
        return $this->products()->get()->avg('rate');
    }

    public function getUrlAttribute()
    {
        return 'shop/' . $this->slug;
    }
}
