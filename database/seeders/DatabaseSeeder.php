<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // CategorySeeder::class,
            // OptionSeeder::class,
            // LocationSeeder::class,
            PhongTroSeeder::class,
            NhaSeeder::class,
            CanHoSeeder::class,
            MatBangSeeder::class, 
        ]);
    }
}
