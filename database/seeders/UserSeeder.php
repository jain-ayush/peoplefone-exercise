<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@yopmail.com',
            'address' => 'Akshya Nagar 1st Block 1st Cross, Pune',
            'email_verified_at' => now(),
            'phone_number' => '+919039063702',
            'password' => bcrypt('admin@123')
        ]);

        // generating users for testing purposes with faker
        \App\Models\User::factory(10)->create();
    }
}
