
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    // Run the database seeds.
    public function run()
    {
        // Insert a new user into the 'users' table
        DB::table('users')->insert([
            'name' => 'John Doe', // Name of the user
            'email' => 'johndoe@example.com', // Email of the user
            'email_verified_at' => now(), // Email verified timestamp
            'password' => Hash::make('password'), // Hashed password
            'remember_token' => Str::random(10), // Random remember token
            'created_at' => now(), // Timestamp when the record was created
            'updated_at' => now(), // Timestamp when the record was last updated
        ]);
    }
}
