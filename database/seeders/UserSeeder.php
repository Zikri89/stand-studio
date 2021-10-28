<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                "firstName" => "Zikri",
                "lastName"  => "Fadli",
                "email"    => "zikri@gmail.com",
                "password" => Hash::make('123456'),
                "roles"     => "1",
            ],
        );
    }
}
