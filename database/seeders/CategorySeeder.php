<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryName = [
            'Cho thuê phòng trọ',
            'Nhà cho thuê',
            'Nhà cho thuê căn hộ',
            'Mặt bằng, văn phòng',
            'Tìm người ở ghép',
        ];

        foreach ($categoryName as $item) {
            try {
                dump($item);
                Category::create([
                    'name' => $item,
                    'title' => $item,
                    'description' => $item,
                    'slug' => Str::slug($item),
                    'created_at' => Carbon::now()
                ]);
              
            }
            catch (\Exception $e){

            }
        }
    }
}
