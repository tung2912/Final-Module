<?php

namespace Database\Seeders;

use App\Models\Estate;
use Illuminate\Database\Seeder;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estate = new Estate();
        $estate->owner_id = 1;
        $estate->city_id = 1;
        $estate->address = '303 E 57th St APT 32B';
        $estate->price = 445000 ;
        $estate->floor_space = 1800 ;
        $estate->bedroom_nums = 3 ;
        $estate->bathroom_nums = 2 ;
        $estate->garage_nums = 1 ;
        $estate->description = 'INCREDIBLE BUY! This is a magnificent opportunity to purchase an apartment that is requiring TLC. It is approximately 1800 square feet with fabulous Southeastern views overlooking the East River. One can also see full Central Park views as well as those of the George Washington Bridge.' ;
        $estate->status = 1;
        $estate->save();


    }
}
