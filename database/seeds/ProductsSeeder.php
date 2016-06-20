<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $product = new App\Product;
        $product->title = 'TV';
        $product->price = 123;
        $product->stock = 23;
        $product->picture_id = 1;
        $product->category_id = 1;
        $product->save();
        $product = new App\Product;
        $product->title = 'Radio';
        $product->price = 13;
        $product->stock = 23;
        $product->picture_id = 1;
        $product->category_id = 1;
        $product->save();
        $product = new App\Product;
        $product->title = 'Mobile';
        $product->price = 1293;
        $product->stock = 23;
        $product->picture_id = 1;
        $product->category_id = 1;
        $product->save();
        $product = new App\Product;
        $product->title = 'Fan';
        $product->price = 23;
        $product->stock = 23;
        $product->picture_id = 1;
        $product->category_id = 1;
        $product->save();
    }

}
