<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleConstants;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->id = RoleConstants::ROLE_ADMIN;
        $role->name ="ADMIN";
        $role->save();

        $role = new Role();
        $role->id = RoleConstants::ROLE_STAFF;
        $role->name ="STAFF";
        $role->save();
    }
}
