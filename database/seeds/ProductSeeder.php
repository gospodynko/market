<?php

use App\Models\Product;
use Antvel\Product\Models\Product as AntvelProduct;
use App\Models\UserProduct;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        factory(UserProduct::class, 500)->create([

        ]);
    }
}
