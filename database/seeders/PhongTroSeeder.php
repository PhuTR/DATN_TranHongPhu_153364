<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhongTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonContent = File::get('chothuephongtro.json');
        $data = json_decode($jsonContent, true);

        foreach ($data['body'] as $item) {
            $priceInVnd = (float) $item['header']['attributes']['price'] * 1000000;

            // Chèn thông tin phòng vào bảng rooms
            $roomId = DB::table('rooms')->insertGetId([
                'name' => $item['header']['title'],
                'slug' => Str::slug($item['header']['title']),
                'price' => $priceInVnd,
                'area' => (float) $item['header']['attributes']['acreage'],
                'description' => nl2br(implode("\n", $item['mainContent']['content'])),
                'city_id' => 1, // Thay thế bằng trường thực tế tương ứng
                'district_id' => 1, // Thay thế bằng trường thực tế tương ứng
                'wards_id' => 1, // Thay thế bằng trường thực tế tương ứng
                'status' => 3, // Nếu tất cả là phòng trống, hoặc có thể tùy chỉnh tùy thuộc vào dữ liệu
                'hot' => 0, // Có thể điều chỉnh tùy thuộc vào dữ liệu
                'range_price' => $this->switchPrice($priceInVnd),
                'range_area' => $this->switchArea($item['header']['attributes']['acreage']),
                'full_address' => $item['header']['address'],
                'service_hot' => (int) $item['header']['star'],
                'category_id' => 1,
                'auth_id' => 1,
                'time_start' => now(),
                'time_stop' => now()->copy()->addDays(60)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Chèn thông tin hình ảnh vào bảng images
            foreach ($item['images'] as $image) {
                DB::table('images')->insert([
                    'name' => 'Image Name', // Thay thế bằng tên thực tế của hình ảnh
                    'path' => $image,
                    'room_id' => $roomId, // Sử dụng ID phòng mới tạo
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
     protected function switchPrice($price)
    {
        switch (true) {
            case $price < 1000000:
                return 1;

            case ($price >= 1000000 && $price < 2000000):
                return 2;

            case ($price >= 2000000 && $price < 3000000):
                return 3;

            case ($price >= 3000000 && $price < 5000000):
                return 4;

            case ($price >= 5000000 && $price < 7000000):
                return 5;

            case ($price >= 7000000 && $price < 10000000):
                return 6;

            case ($price >= 10000000 && $price < 15000000):
                return 7;

            case ($price >= 15000000):
                return 8;
        }
    }

    protected function switchArea($area)
    {
        switch (true) {
            case $area < 20:
                return 1;

            case ($area >= 20 && $area < 30):
                return 2;

            case ($area >= 30 && $area < 50):
                return 3;

            case ($area >= 50 && $area < 60):
                return 4;

            case ($area >= 60 && $area < 70):
                return 5;

            case ($area >= 70 && $area < 80):
                return 6;

            case ($area >= 80 && $area < 100):
                return 7;

            case ($area >= 100 && $area < 120):
                return 8;

            case ($area >= 120 && $area < 150):
                return 9;

            case ($area >= 150):
                return 10;
        }
    }
}
