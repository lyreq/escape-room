<?php

namespace Database\Factories;

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
            'start_time' => '2023-05-01 10:00:00',
            'end_time' => '2023-05-01 11:00:00',
            'escape_room_id' => 1
        ];
    }
}
