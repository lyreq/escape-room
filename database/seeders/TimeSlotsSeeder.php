<?php

namespace Database\Seeders;

use App\Models\TimeSlots;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimeSlots::create([
            'start_time' => '2023-05-01 10:00:00',
            'end_time' => '2023-05-01 11:00:00',
            'escape_room_id' => 1
        ]);

        TimeSlots::create([
            'start_time' => '2023-05-01 12:00:00',
            'end_time' => '2023-05-01 13:00:00',
            'escape_room_id' => 2
        ]);
    }
}
