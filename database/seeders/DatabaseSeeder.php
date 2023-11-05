<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Option;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
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

        $jsonContent = File::get('location.json');
        $data = json_decode($jsonContent, true);

        foreach ($data as $cityData) {
            $city = City::create([
                'name' => $cityData['name'],
                'slug' => Str::slug($cityData['name']),
                'code' => $cityData['code'],
            ]);

            $districts = $cityData['districts'];
            foreach ($districts as $districtData) {
                $district = District::create([
                    'name' => $districtData['name'],
                    'code' => $districtData['code'],
                    'slug' => Str::slug($districtData['name']),
                    'city_code' => $city->code,
                ]);

                $wards = $districtData['wards'];
                foreach ($wards as $wardData) {
                    Ward::create([
                        'name' => $wardData['name'],
                        'code' => $wardData['code'],
                        'slug' => Str::slug($wardData['name']),
                        'district_code' => $district->code,
                    ]);
                }
            }
        }



    }
}
