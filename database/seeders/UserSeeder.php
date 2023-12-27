<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'datn153364@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Trần Phú";
            $user->phone = "0327006685";
            $user->email = "datn153364@gmail.com";
            $user->password = Hash::make('123456');
            $user->save();
        }
    }
}
