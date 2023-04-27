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
        EscapeRooms::factory(10)->create();
    }
}
