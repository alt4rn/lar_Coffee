<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Order;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Order's status 'not paid' & Delivery Method Take Away.
        Order::create([
            'order_number' => '#'.str_pad(1, 8, "0", STR_PAD_LEFT),
            'status' => 'not paid',
            'user_id' => '3',
            're_name' => 'Ian Ardi',
            're_address' => '',
            're_phone' => '083871552271',
            'delivery_method' => 'take away',
            'delivery_cost' => '0',
            'discount' => '0',
            'sub_total' => '192000',
            'total' => '192000',
            'note' => '...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Order's status 'not paid' & Delivery Method GOFOOD.
        Order::create([
            'order_number' => '#'.str_pad(2, 8, "0", STR_PAD_LEFT),
            'status' => 'not paid',
            'user_id' => '4',
            're_name' => 'Septyan Dony',
            're_address' => 'Pondok Maritim Indah',
            're_phone' => '0812070280522',
            'delivery_method' => 'GOFOOD',
            'delivery_cost' => '15000',
            'discount' => '0',
            'sub_total' => '1600000',
            'total' => '1615000',
            'note' => '...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Order's status 'ready to take' & Delivery Method 'take away'.
        Order::create([
            'order_number' => '#'.str_pad(3, 8, "0", STR_PAD_LEFT),
            'status' => 'ready to take',
            'user_id' => '5',
            're_name' => 'Baskoro Nugroho',
            're_address' => '',
            're_phone' => '083830921444',
            'delivery_method' => 'take away',
            'delivery_cost' => '0',
            'discount' => '0',
            'sub_total' => '120000',
            'total' => '120000',
            'note' => '...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Order's status 'sending' & Delivery Method 'GOFOOD'.
        Order::create([
            'order_number' => '#'.str_pad(4, 8, "0", STR_PAD_LEFT),
            'status' => 'sending',
            'user_id' => '6',
            're_name' => 'Sintya Ridho Pamungkas',
            're_address' => 'Tenggilis Mejoyo Selatan VIII',
            're_phone' => '081207111177',
            'delivery_method' => 'GOFOOD',
            'delivery_cost' => '15000',
            'discount' => '0',
            'sub_total' => '90000',
            'total' => '105000',
            'note' => '...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Order's status 'done' & Delivery Method 'take away'.
        Order::create([
            'order_number' => '#'.str_pad(5, 8, "0", STR_PAD_LEFT),
            'status' => 'done',
            'user_id' => '7',
            're_name' => 'Irman Faqrizal',
            're_address' => '',
            're_phone' => '085830250522',
            'delivery_method' => 'take away',
            'delivery_cost' => '0',
            'discount' => '0',
            'sub_total' => '50000',
            'total' => '50000',
            'note' => '...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Order's status 'done' & Delivery Method 'GOFOOD'.
        Order::create([
            'order_number' => '#'.str_pad(6, 8, "0", STR_PAD_LEFT),
            'status' => 'done',
            'user_id' => '8',
            're_name' => 'Erick Kresnamurti',
            're_address' => 'Kembang Kuning Darmo',
            're_phone' => '081230330430',
            'delivery_method' => 'GOFOOD',
            'delivery_cost' => '15000',
            'discount' => '0',
            'sub_total' => '189500',
            'total' => '204500',
            'note' => '...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // More than 1 order
        Order::create([
            'order_number' => '#'.str_pad(7, 8, "0", STR_PAD_LEFT),
            'status' => 'not paid',
            'user_id' => '4',
            're_name' => 'Reno A. J.',
            're_address' => 'Rungkut Mejoyo Selatan',
            're_phone' => '0812070280522',
            'delivery_method' => 'GOFOOD',
            'delivery_cost' => '15000',
            'discount' => '0',
            'sub_total' => '300000',
            'total' => '315000',
            'note' => '...',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
