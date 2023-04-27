<?php

namespace Tests\Feature;

use App\Models\Bookings;
use App\Models\TimeSlots;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingControlerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_booking_store(): void
    {
        $random = TimeSlots::inRandomOrder()->first();
        $data = [
            "escape_room_id" => $random->escape_room_id,
            "time_slot_id" => $random->id,
            "num_participants" => 1,
        ];
        $response = $this->post('/api/bookings', $data, $this->header);

        $response->assertStatus(200);
    }

    public function test_get_booking_index()
    {
        $response = $this->get('/api/bookings', $this->header);

        $response->assertStatus(200);
    }

    public function test_delete_booking()
    {
        $random = Bookings::inRandomOrder()->first();
        $response = $this->delete('/api/bookings/' . $random->id,[],$this->header);
        $response->assertStatus(200);
    }
}
