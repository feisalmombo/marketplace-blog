<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->category_name = 'Bank';
        $category->save();

        $category = new Category();
        $category->category_name = 'Microfinance';
        $category->save();

        $category = new Category();
        $category->category_name = 'Saccoss';
        $category->save();
    }
}
