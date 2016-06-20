<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new App\Customer;
        $customer->name = 'Rony';
        $customer->save();
        $customer->name = 'Rafik';
        $customer->save();
    }
}
