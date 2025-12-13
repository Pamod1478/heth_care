<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pamod',
            'email' => 'pamodsachintha2003@gmail.com',
            'password' => Hash::make('Sachi@1234'),
        ]);
    }
}