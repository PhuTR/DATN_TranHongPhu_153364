<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
