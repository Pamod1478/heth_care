<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->insert([
            // First mobile number with 2 patients
            [
                'name' => 'John Doe',
                'mobile_number' => '0771234567',
                'age' => 35,
                'gender' => 'male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Doe',
                'mobile_number' => '0771234567',
                'age' => 32,
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Second mobile number with 1 patient
            [
                'name' => 'Alice Smith',
                'mobile_number' => '0779876543',
                'age' => 28,
                'gender' => 'female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}