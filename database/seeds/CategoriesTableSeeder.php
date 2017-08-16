<?php

/*
 * This file is part of the Antvel App package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;
use Antvel\Categories\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->categories() as $category => $subCategories) {

            $createted = factory(Category::class)->create([
                'name' => $category,
            ]);

            foreach ($subCategories as $subCategory) {

                factory(Category::class)->create([
                    'category_id' => $createted->id,
                    'name' => $subCategory,
                ]);
            }
        }
    }

    protected function categories()
    {
        return [
            "ПММ" => [
                "Дизельне паливо",
                "Масла"
            ],
            "Засоби захисту рослин" => [
                "Акарициди",
                "Гербіциди",
                "Десиканти",
                "Інсектициди",
                "Протруйники",
                "Фуміганти",
                "Фунгіциди"
            ],
            "Посівний матеріал" => [
                "Насіння зернових",
                "Насіння олійних",
                "Насіння бобових",
                "Інші насіння"
            ],
            "Добрива" => [
                "Мінеральні",
                "Органічні",
                "Органомінеральні",
                "Регулятори росту"
            ],
            "Запчастини та шини" => [
                "Запчастини",
                "Шини"
            ],
            "Агротехніка" => [
                "Самохідна",
                "Причіпна"
            ],
            "Урожай" => [
                "Зернові",
                "Олійні",
                "Бобові",
                "Продукти переробки",
                "Нішеві культури",
                "Органіка"
            ],
        ];
    }
}
