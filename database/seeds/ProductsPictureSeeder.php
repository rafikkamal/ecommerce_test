<?php

use Illuminate\Database\Seeder;

class ProductsPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_picture=new \App\ProductPicture;
        $product_picture->title='no_image.png';
        $product_picture->save();
    }
}
