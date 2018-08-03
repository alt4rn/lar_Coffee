<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Albert Pangestu',
            'address' => 'Satelit Utara 9 JT-12',
            'phone' => '03177772228',
            'email' => 'albert.pangestu1@gmail.com',
            'password' => bcrypt('albert4'),
            'isAdmin' => '1',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // User
        User::create([
            'name' => 'Reno Adi Juliansyah',
            'address' => 'Raya Tenggilis',
            'phone' => '03171552271',
            'email' => 'renoadi11@gmail.com',
            'password' => bcrypt('reno11'),
            'isAdmin' => '1',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // User for Order's Dummy Data
        User::create([
            'name' => 'Ian Ardi Hisbulloh',
            'address' => 'Raya Tenggilis Mejoyo Selatan',
            'phone' => '082171332241',
            'email' => 'ianardi94@gmail.com',
            'password' => bcrypt('ianardi'),
            'isAdmin' => '0',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Septyan Dony',
            'address' => 'Pondok Maritim Indah',
            'phone' => '0812402302100',
            'email' => 'septyandony@gmail.com',
            'password' => bcrypt('septyandony'),
            'isAdmin' => '0',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Baskoro Nugroho',
            'address' => 'Raya Tenggilis Mejoyo Selatan VI',
            'phone' => '03170290633',
            'email' => 'baznugo@gmail.com',
            'password' => bcrypt('baskoro'),
            'isAdmin' => '0',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Sintya Ridho Pamungkas',
            'address' => 'Raya Tenggilis Mejoyo Selatan VI',
            'phone' => '03170980233',
            'email' => 'sintyaridho@gmail.com',
            'password' => bcrypt('sintyaridho'),
            'isAdmin' => '0',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Irman Faqrizal',
            'address' => 'Raya Tenggilis Mejoyo Selatan VI',
            'phone' => '083830924333',
            'email' => 'irmanfaqrizal@gmail.com',
            'password' => bcrypt('irmanfaqrizal'),
            'isAdmin' => '0',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Erick Kresnamurti',
            'address' => 'Kembang Kuning',
            'phone' => '081270270599',
            'email' => 'erick.sancaka@gmail.com',
            'password' => bcrypt('erick.sancaka'),
            'isAdmin' => '0',
            'active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
