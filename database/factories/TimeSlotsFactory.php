<?php

namespace Database\Factories;

use App\Models\EscapeRooms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeSlots>
 */
class TimeSlotsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_time' => fake()->dateTime(),
            'end_time' => fake()->dateTime(),
            'escape_room_id' => mt_rand(1,EscapeRooms::count())
        ];
    }
}
