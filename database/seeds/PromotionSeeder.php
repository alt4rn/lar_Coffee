<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Promotion;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Promotion ended.
        Promotion::create([
            'coupon' => 'CGNATAL',
            'title' => 'Diskon Natal Coffee Grande',
            'description' => 'Hi, coffee lovers! Sekarang Coffee Grande sedang mengadakan promo diskon natal sebesar 20% dengan minimal pembelian 50 ribu untuk pembelian semua jenis produk apapun. Jangan lupa gunakan kode Voucher = CGNATAL.',
            'starting_date' => '2017-12-24',
            'end_date' => '2018-01-01',
            'minimum_payment' => '50000',
            'discount' => '0.2',
            'image' => 'img/pro/ERK_1911.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Promotion still on going.
        Promotion::create([
            'coupon' => '2018DISKON',
            'title' => 'Diskon 2018 Coffee Grande',
            'description' => 'Halo, coffee lovers! Saat ini, Coffee Grande sedang merayakan promo diskon pada tahun 2018 sebesar 10% tanpa minimal pembelian untuk pembelian semua jenis produk apapun. Jangan lupa gunakan kode Voucher = 2018DISKON.',
            'starting_date' => '2018-01-01',
            'end_date' => '2018-12-31',
            'minimum_payment' => '0',
            'discount' => '0.1',
            'image' => 'img/pro/ERK_2010_LQ.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
