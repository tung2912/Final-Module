<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();


=======
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CitySeeder::class,
            ClientSeeder::class,
            EstateSeeder::class
        ]);
>>>>>>> c99677cc62a8d7bdba81d164656858ce92e4ac85
    }
}
