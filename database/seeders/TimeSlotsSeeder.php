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
       TimeSlots::factory(1)->create();
    }
}
