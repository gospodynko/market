<?php

namespace App\Models;

use App\User;
class AgroUser extends User
{
    protected $table = 'agroyard_users';

    protected $fillable = [
        'inn',
        'email',
        'phone',
        'first_name',
        'last_name',
        'second_name',
        'profile_photo',
        'region_id',
        'role'
    ];

    public function autosetRole(){

//        $res = \DB::select(\DB::raw("SELECT ac.companyRole FROM agroyard_companies AS ac, agroyard_company_users AS acu
//                                  WHERE ac.id = acu.company_id AND acu.user_id={$this->id} "));
//
//        $this->role = 'customer';
//        foreach($res AS $item){
//            if(strpos($item->companyRole, '2')){
//                $this->role = 'seller';
//            }
//        }
//        $this->save();
    }

}
