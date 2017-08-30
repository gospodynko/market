<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Antvel\Categories\Models\Category;
use Antvel\Product\Models\Concerns\Pictures;
use App\Models\UserProduct;

class Product extends Model
{

    use Pictures;

    protected $with = ['pictures'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function user_products()
    {
        return $this->hasMany(UserProduct::class);
    }

    public static function images(Product $product)
    {
        return json_decode($product->features)->images;
    }

    public function getPriceMin()
    {
        $tmpArr = [];

        $minPriceUAH = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 1)
            ->min('price');
        if ($minPriceUAH !== NULL)
            array_push($tmpArr, $minPriceUAH);

        $minPriceUSD = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 2)
            ->min('price');
        if ($minPriceUSD !== NULL)
            array_push($tmpArr, \App\Helpers\CurrencyRates::convertToUAH($minPriceUSD, 2));

        $minPriceEUR = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 3)
            ->min('price');
        if ($minPriceEUR !== NULL)
            array_push($tmpArr, \App\Helpers\CurrencyRates::convertToUAH($minPriceEUR, 3));

        $min = (count($tmpArr) > 0) ? min($tmpArr) : 0;
        return number_format($min, 2, '.', '');
    }

    public function getPriceMax()
    {
        $tmpArr = [];

        $minPriceUAH = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 1)
            ->max('price');
        if ($minPriceUAH !== NULL)
            array_push($tmpArr, $minPriceUAH);

        $minPriceUSD = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 2)
            ->max('price');
        if ($minPriceUSD !== NULL)
            array_push($tmpArr, \App\Helpers\CurrencyRates::convertToUAH($minPriceUSD, 2));

        $minPriceEUR = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 3)
            ->max('price');
        if ($minPriceEUR !== NULL)
            array_push($tmpArr, \App\Helpers\CurrencyRates::convertToUAH($minPriceEUR, 3));

        $max = (count($tmpArr) > 0) ? min($tmpArr) : 0;
        return number_format($max, 2, '.', '');
    }

    public function getPriceAvg()
    {
        $tmpArr = [];

        $minPriceUAH = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 1)
            ->avg('price');
        if ($minPriceUAH !== NULL)
            array_push($tmpArr, $minPriceUAH);

        $minPriceUSD = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 2)
            ->avg('price');
        if ($minPriceUSD !== NULL)
            array_push($tmpArr, \App\Helpers\CurrencyRates::convertToUAH($minPriceUSD, 2));

        $minPriceEUR = UserProduct::where('product_id', $this->id)
            ->where('currency_id', 3)
            ->avg('price');
        if ($minPriceEUR !== NULL)
            array_push($tmpArr, \App\Helpers\CurrencyRates::convertToUAH($minPriceEUR, 3));

        $average = !empty($tmpArr) ? array_sum($tmpArr) / count($tmpArr) : 0;
        return number_format($average, 2, '.', '');
    }
}
