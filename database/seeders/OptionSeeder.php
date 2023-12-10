<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Nam','Nữ'] as $item) {
            try {
                dump($item);
                Option::create([
                    'name' => $item,
                    'type' => 1,
                    'created_at' => Carbon::now()
                ]);
              
            }
            catch (\Exception $e){

            }
        }
    }
}
