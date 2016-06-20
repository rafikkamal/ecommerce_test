<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new App\Category;
        $category->title = 'Electronics';
        $category->save();
        $category = new App\Category;
        $category->title = 'Electrical Appliances';
        $category->save();
    }
}
