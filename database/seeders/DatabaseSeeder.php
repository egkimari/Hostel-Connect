<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Run the database seeds.
    public function run()
    {
        // Call the seeders
        $this->call([
            UsersTableSeeder::class, // Call the UsersTableSeeder
            HostelsTableSeeder::class, // Call the HostelsTableSeeder
            // Add other seeders here
        ]);
    }
}
