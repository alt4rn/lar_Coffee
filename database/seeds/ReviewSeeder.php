<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Review's approved & spam value is 0
        Review::create([
            'product_id' => '17',
            'user_id' => '7',
            'rating' => '5',
            'comment' => 'Caramel pada produk tidak terlalu manis, dan kopinya terasa sangat enak. Sangat direkomendasikan untuk para pecinta kopi dengan sensasi dingin.',
            'spam' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Review's approved & spam value is 1
        Review::create([
            'product_id' => '18',
            'user_id' => '7',
            'rating' => '1',
            'comment' => 'Hazelnut pada kopi terasa tidak enak, namun kopi cappucino-nya biasa saja, tidak ada rasa unik terhadap kopi ini.',
            'spam' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Review's approved value is 1 & spam value is 0
        Review::create([
            'product_id' => '34',
            'user_id' => '8',
            'rating' => '5',
            'comment' => 'Low budget McCafe Frappe Choco, rasa pada frappe hampir serupa dengan punya McD.',
            'spam' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Review's approved value is 0 & spam value is 1
        Review::create([
            'product_id' => '35',
            'user_id' => '8',
            'rating' => '1',
            'comment' => 'Vanilla pada frappe agak kecut sehingga rasa pada minuman tidak nikmat sama sekali.',
            'spam' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Random value
        Review::create([
            'product_id' => '41',
            'user_id' => '8',
            'rating' => '4',
            'comment' => 'Lemon pada minuman sangat menyegarkan, namun menurut saya rasa yang dipadu pada minuman isotonik tidak cocok.',
            'spam' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Review::create([
            'product_id' => '52',
            'user_id' => '8',
            'rating' => '5',
            'comment' => 'Porsi & rasa pada makanan ini cocok untuk saya, & harga yang diberikan terhadap makanan ini juga tidak seberapa mahal.',
            'spam' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
