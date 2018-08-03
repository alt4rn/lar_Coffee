<?php

use App\Product;
use Carbon\Carbon;
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
        // Gourmet Coffee
        Product::create([
                'category_id' => '1',
                'product_name' => 'House Blend',
                'product_description' => 'Campuran kopi spesial yang hanya ada di Coffee Grande.',
                'product_price' => '16000',
                'image' => 'img/gc/ERK_1892.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '1',
                'product_name' => 'Robusta Premium',
                'product_description' => 'Kopi kental & pahit jenis Robusta yang dapat membangunkan.',
                'product_price' => '16000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '1',
                'product_name' => 'Sumatera Mandheling',
                'product_description' => 'Kopi kental dengan keasaman yang rendah dari pulau Sumatera.',
                'product_price' => '16000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        // House Blend Grande Served Hot
        Product::create([
                'category_id' => '2',
                'product_name' => 'Single Espresso',
                'product_description' => 'Secangkir kopi dengan ukuran kecil & dengan aroma yang kuat.',
                'product_price' => '14000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Double Espresso',
                'product_description' => 'Secangkir kopi dengan ukuran yang kecil & mempunyai aroma yang dua kali lebih kuat.',
                'product_price' => '16000',
                'image' => 'img/hbh/ERK_1871.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Cappucino',
                'product_description' => 'Espresso dengan campuran busa serta taburan coklat bubuk.',
                'product_price' => '22500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Caramel Cappucino',
                'product_description' => 'Campuran kopi dengan susu & sirup karamel.',
                'product_price' => '24000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Hazelnut Cappucino',
                'product_description' => 'Campuran kopi dengan susu & sirup Hazelnut.',
                'product_price' => '24000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Cafe Mocca',
                'product_description' => 'Kopi dicampur dengan sirup coklat dengan rasa yang unik.',
                'product_price' => '23500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Cafe Latte',
                'product_description' => 'Kopi nikmat dengan rasa krim yang halus.',
                'product_price' => '23500',
                'image' => 'img/hbh/ERK_1846.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Chocolaccino',
                'product_description' => 'Kopi pahit yang dipadu dengan sirup coklat serta whipped cream di bagian atas.',
                'product_price' => '26000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '2',
                'product_name' => 'Hot Chocolate',
                'product_description' => 'Perpaduan coklat murni dengan susu serta sirup coklat.',
                'product_price' => '22500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        
        // House Blend Grande Served Chill
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Espresso Shake',
                'product_description' => 'Nikmati kesegaran cara minum Espresso dengan sensasi dingin.',
                'product_price' => '19000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Cappucinno',
                'product_description' => 'Cara unik untuk menikmati sensasi Cappuccino dingin.',
                'product_price' => '23500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Cafe Mocca',
                'product_description' => 'Minuman kopi dengan coklat yang lezat.',
                'product_price' => '24500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Cafe Latte',
                'product_description' => 'Kopi pahit dengan busa susu serta rasa yang creamy & lembut.',
                'product_price' => '24500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Caramel Cappucino',
                'product_description' => 'Nikmatnya minuman kopi dengan rasa karamel.',
                'product_price' => '25000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Hazelnut Cappucino',
                'product_description' => 'Nikmatnya minuman kopi dengan rasa hazelnut.',
                'product_price' => '25000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Vanilla Latte',
                'product_description' => 'Cara asik untuk pecinta kopi dengan rasa vanilla susu.',
                'product_price' => '25000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Coffee',
                'product_description' => 'Es kopi yang menyegarkan.',
                'product_price' => '17500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Ice Chocolate',
                'product_description' => 'Cara minum coklat dingin yang nikmat.',
                'product_price' => '22500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Coffee and Cream Shake',
                'product_description' => 'Kopi Espresso yang disajikan dingin dengan krim.',
                'product_price' => '20000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Coffee Float',
                'product_description' => 'Kombinasi kopi dingin, susu, es krim vanilla & whipped cream.',
                'product_price' => '27500',
                'image' => 'img/hbc/ERK_1799.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '3',
                'product_name' => 'Milk Shake (Vanilla / Strawberry / Chocolate)',
                'product_description' => 'Kombinasi susu & ice cream dengan rasa segar.',
                'product_price' => '23000',
                'image' => 'img/hbc/ERK_1965.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        
        // The Frappe
        Product::create([
            
                'category_id' => '4',
                'product_name' => 'Frappes Mocca Tart',
                'product_description' => 'Ice blended yang kaya rasa coklat & kopi dengan sensasi es krim.',
                'product_price' => '29000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Caramel Salt',
                'product_description' => 'Minuman dengan espresso, es krim & saus karamel.',
                'product_price' => '29000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Chocochips',
                'product_description' => 'Ice blended dengan potongan coklat pada bagian bawah.',
                'product_price' => '29000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Choco Verde',
                'product_description' => 'Ice blended dengan campuran biji kopi yang menyatu dengan latte.',
                'product_price' => '27500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Green Tea',
                'product_description' => 'Daun teh Jepang yang diolah & disajikan oleh barista Coffee Grande.',
                'product_price' => '27500',
                'image' => 'img/tf/ERK_1924.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Banana Split',
                'product_description' => 'Ice blended frappe dengan potongan buah pisang.',
                'product_price' => '27500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Tiramisu',
                'product_description' => 'Ice blended yang lembut dengan campuran Kahlua.',
                'product_price' => '27500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Cookies & Cream',
                'product_description' => 'Ice blended yang dicampur dengan biskuit.',
                'product_price' => '27500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Java Latino',
                'product_description' => 'Keunikan kopi jawa yang dicampur dengan es krim & sirup coklat.',
                'product_price' => '27500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Chocolate',
                'product_description' => 'Ice blended coklat untuk penggemar coklat & kopi.',
                'product_price' => '26500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '4',
                'product_name' => 'Frappes Vanilla Latte',
                'product_description' => 'Ice blended dengan rasa vanilla & susu yang lembut.',
                'product_price' => '26500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        // Gourmet Tea Selection
        Product::create([
                'category_id' => '5',
                'product_name' => 'Green Tea Latte (Hot / Chill)',
                'product_description' => 'Teh hijau dari Jepang yang disajikan dengan latte.',
                'product_price' => '22500',
                'image' => 'img/gts/ERK_1765.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '5',
                'product_name' => 'Tea Fizz',
                'product_description' => 'Sajian kesegaran shake tea hitam dengan campuran buah lemon.',
                'product_price' => '22500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '5',
                'product_name' => 'Hot Tea',
                'product_description' => 'Teh untuk menghangatkan badan anda.',
                'product_price' => '17500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '5',
                'product_name' => 'Berry Tea',
                'product_description' => 'Teh dengan campuran buah berry segar.',
                'product_price' => '20000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        // Fruits Freeze
        Product::create([
                'category_id' => '6',
                'product_name' => 'La Frutas',
                'product_description' => 'Minuman segar dengan isotonik, mix berrys, & blue curacao.',
                'product_price' => '25000',
                'image' => 'img/ff/ERK_2019.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '6',
                'product_name' => 'Lemon Fizz',
                'product_description' => 'Minuman segar dengan isotonik & jus lemon.',
                'product_price' => '23500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '6',
                'product_name' => 'The Summer',
                'product_description' => 'Minuman yang terbuat dari buah leci, berry, serta peach yang segar.',
                'product_price' => '25000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '6',
                'product_name' => 'Fruit Punch Tropical',
                'product_description' => 'Campuran aneka jus buah, special dari Coffee Grande.',
                'product_price' => '21500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '6',
                'product_name' => 'Blue Lagoon',
                'product_description' => 'Resep minuman yang terbuat dari buah & sirup curacao.',
                'product_price' => '21500',
                'image' => 'img/ff/ERK_1834.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '6',
                'product_name' => 'Smoothies',
                'product_description' => 'Ice blended buah segar dengan susu, yogurt, & madu.',
                'product_price' => '25000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        // Pasta Sandwich Companion
        Product::create([
                'category_id' => '7',
                'product_name' => 'French Fries',
                'product_description' => 'Kentang goreng impor dengan rasa yang gurih & lezat.',
                'product_price' => '15000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Cabinet Bread',
                'product_description' => 'Roti panggang lapis dengan taburan kopi & es krim coklat.',
                'product_price' => '25000',
                'image' => 'img/psc/ERK_2089.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Macaroni Schotel',
                'product_description' => 'Makaroni panggang dengan saus becamel & dilengkapi dengan potongan sayur & daging.',
                'product_price' => '28000',
                'image' => 'img/psc/ERK_1951.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Macaroni Lemon Cheese',
                'product_description' => 'Makaroni panggang dengan campuran saus lemon & krim keju.',
                'product_price' => '26500',
                'image' => 'img/psc/ERK_2045.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Pene Algera',
                'product_description' => 'Pasta yang dicampur dengan krim keju & ditaburi daging, tuna, & saus tomat.',
                'product_price' => '31000',
                'image' => 'img/psc/ERK_1997.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Banana Wrapped',
                'product_description' => 'Kudapan pisang goreng disajikan dengan es krim rasa vanilla.',
                'product_price' => '24500',
                'image' => 'img/psc/ERK_2117.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Grande Sampler',
                'product_description' => 'Porsi dengan sajian kentang, sosis, bola-bola udang & keju, & money bag.',
                'product_price' => '31500',
                'image' => 'img/psc/ERK_1941.jpg',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Spaghetti Agliolio',
                'product_description' => 'Spaghetti pasta dengan rasa bawang putih dipadu dengan minyak zaitun.',
                'product_price' => '26500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Spaghetti Carbonara',
                'product_description' => 'Spaghetti ala Italia yang dimasak dengan bumbu krim yang lembut.',
                'product_price' => '29000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Farfale Mushroom Alfredo',
                'product_description' => 'Pasta berbentuk kupu-kupu yang disajikan dengan saus krim & daging asap.',
                'product_price' => '29000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Pronto Club Sandwich',
                'product_description' => 'Roti lapis keju, telur, daging asap, & ayam fillet, disajikan dengan kentang goreng.',
                'product_price' => '32500',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Product::create([
                'category_id' => '7',
                'product_name' => 'Grande Tuna Sandwich',
                'product_description' => 'Roti lapis keju, telur, daging asap, & ikan tuna, disajikan dengna kentang goreng.',
                'product_price' => '31000',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
