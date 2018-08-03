<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\OrderProduct;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Order ID 1
        OrderProduct::create([
            'order_id' => '1',
            'product_id' => '1',
            'selling_price' => '16000',
            'quantity' => '4',
        ]);

        OrderProduct::create([
            'order_id' => '1',
            'product_id' => '2',
            'selling_price' => '16000',
            'quantity' => '4',
        ]);

        OrderProduct::create([
            'order_id' => '1',
            'product_id' => '3',
            'selling_price' => '16000',
            'quantity' => '4',
        ]);

        // Order ID 2
        OrderProduct::create([
            'order_id' => '2',
            'product_id' => '17',
            'selling_price' => '25000',
            'quantity' => '11',
        ]);

        OrderProduct::create([
            'order_id' => '2',
            'product_id' => '18',
            'selling_price' => '25000',
            'quantity' => '11',
        ]);

        OrderProduct::create([
            'order_id' => '2',
            'product_id' => '19',
            'selling_price' => '25000',
            'quantity' => '10',
        ]);

        // Order ID 3
        OrderProduct::create([
            'order_id' => '3',
            'product_id' => '46',
            'selling_price' => '15000',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '3',
            'product_id' => '39',
            'selling_price' => '20000',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '3',
            'product_id' => '42',
            'selling_price' => '25000',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '3',
            'product_id' => '54',
            'selling_price' => '29000',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '3',
            'product_id' => '57',
            'selling_price' => '31000',
            'quantity' => '1',
        ]);

        // Order ID 4
        OrderProduct::create([
            'order_id' => '4',
            'product_id' => '4',
            'selling_price' => '14000',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '4',
            'product_id' => '7',
            'selling_price' => '24000',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '4',
            'product_id' => '11',
            'selling_price' => '26000',
            'quantity' => '2',
        ]);

        // Order ID 5
        OrderProduct::create([
            'order_id' => '5',
            'product_id' => '17',
            'selling_price' => '25000',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '5',
            'product_id' => '18',
            'selling_price' => '25000',
            'quantity' => '1',
        ]);

        // Order ID 6
        OrderProduct::create([
            'order_id' => '6',
            'product_id' => '34',
            'selling_price' => '26500',
            'quantity' => '2',
        ]);

        OrderProduct::create([
            'order_id' => '6',
            'product_id' => '35',
            'selling_price' => '26500',
            'quantity' => '1',
        ]);

        OrderProduct::create([
            'order_id' => '6',
            'product_id' => '41',
            'selling_price' => '23500',
            'quantity' => '2',
        ]);

        OrderProduct::create([
            'order_id' => '6',
            'product_id' => '52',
            'selling_price' => '31000',
            'quantity' => '2',
        ]);

        // Order ID 7
        OrderProduct::create([
            'order_id' => '2',
            'product_id' => '17',
            'selling_price' => '25000',
            'quantity' => '11',
        ]);

        OrderProduct::create([
            'order_id' => '2',
            'product_id' => '18',
            'selling_price' => '25000',
            'quantity' => '11',
        ]);

        OrderProduct::create([
            'order_id' => '2',
            'product_id' => '19',
            'selling_price' => '25000',
            'quantity' => '10',
        ]);
    }
}
