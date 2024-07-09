<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostelsTableSeeder extends Seeder
{
    // Run the database seeds.
    public function run()
    {
        // Insert multiple hostels into the 'hostels' table
        DB::table('hostels')->insert([
            [
                'name' => 'Hostel A', // Name of the hostel
                'location' => 'Location A', // Location of the hostel
                'rent' => 1000, // Rent amount
                'ratings' => 4.5, // Ratings out of 5
                'description' => 'Description A', // Description of the hostel
                'image' => 'hostel_a.jpg', // Image filename
                'created_at' => now(), // Timestamp when the record was created
                'updated_at' => now(), // Timestamp when the record was last updated
            ],
            [
                'name' => 'Hostel B', // Name of the hostel
                'location' => 'Location B', // Location of the hostel
                'rent' => 1200, // Rent amount
                'ratings' => 4.7, // Ratings out of 5
                'description' => 'Description B', // Description of the hostel
                'image' => 'hostel_b.jpg', // Image filename
                'created_at' => now(), // Timestamp when the record was created
                'updated_at' => now(), // Timestamp when the record was last updated
            ],
            // Add more hostel entries here
        ]);
    }
}
