<?php

namespace Database\Seeders;

use App\Models\Bookings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bookings::create([
            'user_id' => 1,
            'time_slot_id' => 1,
            'num_participants' => 4,
            'discount_applied' => 0
        ]);
    }
}
