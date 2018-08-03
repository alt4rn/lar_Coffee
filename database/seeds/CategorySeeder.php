<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $gourmet = Category::create([
            'name' => 'Gourmet Coffee',
            'description' => 'Kopi spesial menggunakan biji kopi dengan rasa terbaik.',
            'image' => 'img/cat/gc.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $houseBHot = Category::create([
            'name' => 'House Blend Grande Served Hot',
            'description' => 'Kopi dengan kombinasi biji kopi yang mempunyai cita rasa yang unik.',
            'image' => 'img/cat/hbh.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $houseBChill = Category::create([
            'name' => 'House Blend Grande Served Chill',
            'description' => 'Kopi dengan kombinasi biji kopi yang mempunyai cita rasa yang unik dan menyegarkan.',
            'image' => 'img/cat/hbc.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $frappes = Category::create([
            'name' => 'The Frappes',
            'description' => 'Kopi yang mempunyai khas sendiri, yaitu terbalut buih pada bagian atasnya.',
            'image' => 'img/cat/tf.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $gts = Category::create([
            'name' => 'Gourmet Tea Selection',
            'description' => 'Minuman yang spesial diseduh dengan daun teh impor.',
            'image' => 'img/cat/gts.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $ff = Category::create([
            'name' => 'Fruits Freeze',
            'description' => 'Minuman buah segar yang dipadu dengan bahan lain yang memberikan rasa yang unik.',
            'image' => 'img/cat/ff.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $pastaSC = Category::create([
            'name' => 'Pasta, Sandwich, & Companion',
            'description' => 'Makanan olahan yang digunakan pada masakan Italia.',
            'image' => 'img/cat/psc.jpg',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
