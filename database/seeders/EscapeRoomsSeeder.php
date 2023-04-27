<?php

namespace Database\Seeders;

use App\Models\EscapeRooms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscapeRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EscapeRooms::create([
            'name' => 'The Haunted Mansion',
            'theme' => 'Horror',
            'max_participants' => 6
        ]);

        EscapeRooms::create([
            'name' => 'The Lost Treasure',
            'theme' => 'Adventure',
            'max_participants' => 4
        ]);
    }
}
