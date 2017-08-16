<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 8/15/17
 * Time: 10:58 AM
 */

namespace App\Helpers;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\CurrencyRate;


class CurrencyRates
{
    public static function updateRates(){
        self::createRates();
        $needToUpdate = false;

        $rates = CurrencyRate::all();
        foreach($rates AS $rate){



            if($rate->updated_at == NULL)
                $needToUpdate = true;

            $now = Carbon::now();
            $rateUpdatedAt = Carbon::parse($rate->updated_at);
            if($now->diffInHours($rateUpdatedAt) > 0)
                $needToUpdate = true;
        }

        if($needToUpdate){
            $client = new Client();
            $response = $client->request('GET','http://bank-ua.com/export/currrate.xml');

            $response  =$response = simplexml_load_string($response->getBody());
            foreach ($response AS $item){
                if((int)$item->code == 840 || (int)$item->code == 978){
                    $rate = CurrencyRate::where('code', (int)$item->code)->first();
                    $rate->rate = (double)$item->rate;
                    $rate->setUpdatedAt(Carbon::now());
                    $rate->save();
                }

            }
        }
    }

    private static function createRates(){
        if(CurrencyRate::select('id')->count() == 0){
            $rate = new CurrencyRate();
            $rate->char3 = 'USD';
            $rate->code = 840;
            $rate->rate = 0;
            $rate->currency_id = 2;
            $rate->created_at = NULL;
            $rate->updated_at = NULL;
            $rate->save();

            $rate = new CurrencyRate();
            $rate->char3 = 'EUR';
            $rate->code = 978;
            $rate->rate = 0;
            $rate->currency_id = 3;
            $rate->created_at = NULL;
            $rate->updated_at = NULL;
            $rate->save();
        }
    }

    public static function convertToUAH($price, $currency_id){
        self::updateRates();
        if($currency_id == 1)
            return $price;
        $rate = CurrencyRate::where('currency_id', $currency_id)->first();

        return $rate->rate / 100 * $price;
    }
}