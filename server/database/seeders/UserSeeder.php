<?php

namespace Database\Seeders;

use App\Models\RoleConstants;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = new User();
        $user->name = "tung";
        $user->email = "tung@gmail.com";
        $user->password = Hash::make('123456');
        $user->role_id = RoleConstants::ROLE_ADMIN;
        $user->save();

        $user = new User();
        $user->name = "tran";
        $user->email = "tran@gmail.com";
        $user->password = Hash::make('123456');
        $user->role_id = RoleConstants::ROLE_STAFF;
        $user->save();


    }
}
