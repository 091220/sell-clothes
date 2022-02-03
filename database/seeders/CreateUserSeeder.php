<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Module\Users\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'admin@gmail.com';
        $user->name = 'Admin';
        $user->phone = '0332815994';
        $user->password = '123456';
        $user->is_admin = 1;
        $user->is_locked = 0;
        $user->province_id = 'e63e5ee9-e804-4d62-9142-cb9032bf1be6';
        $user->district_id = 'e1af53e4-5685-4dcf-ba02-c8a223057578';
        $user->commune_id = '74d4aa96-9d08-4bc4-82d8-4fcfe0e619db';
        $user->location_details = 'Tang 20, toa nha Song Da';
        $user->save();
    }
}
