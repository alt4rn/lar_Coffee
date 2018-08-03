<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            PromotionSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class,
            OrderProductSeeder::class,
        ]);
    }
}
