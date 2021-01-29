<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->name = "New York City";
        $city->user_id = 2;
        $city->save();

        $city = new City();
        $city->name = "Chicago";
        $city->user_id = 2;
        $city->save();

    }
}
