<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Owner();
        $owner->name = 'nam';
        $owner->email = 'nam@gmail.com';
        $owner->phone = '0987654312';
        $owner->address = 'Hue City';
        $owner->password = Hash::make('123456');
        $owner->save();
    }
}
