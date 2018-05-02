<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgroAuth extends Model
{
    protected $table = 'agroyard_tokens';
    protected $fillable = ['token', 'user_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(AgroUser::class, 'id','user_id');
    }
}
