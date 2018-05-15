<?php

namespace App\Http\Controllers;

use App\Models\CreditContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailOrderController extends Controller
{
    public function setCreditOrder(Request $request)
    {
        $region_id = $request->input('region');
//        $credit_mail = CreditContacts->findOrFail(['id_credit_region'=>$region_id]);
//        dd($credit_mail);
//        return $request->all();
//        return $credit_mail;
    }
}
