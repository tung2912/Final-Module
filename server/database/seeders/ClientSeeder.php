<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = 'Nguyen Van A';
        $client->email = 'A@gmail.com';
        $client->phone = '123456789';
        $client->address = 'New York City';
        $client->isRegistered = true;
        $client->password = Hash::make('123456');
        $client->save();
    }
}
