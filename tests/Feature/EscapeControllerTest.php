<?php

namespace Tests\Feature;

use App\Models\EscapeRooms;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EscapeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_escape_rooms(): void
    {
        $response = $this->get('/api/escape-rooms', $this->header);

        $response->assertStatus(200);
    }

    public function test_get_escape_rooms_show()
    {
        $random = EscapeRooms::inRandomOrder()->first();
        $response = $this->get('/api/escape-rooms/' . $random->id, $this->header);

        $response->assertStatus(200);
    }
    public function test_get_escape_rooms_time_slots()
    {
        $random = EscapeRooms::inRandomOrder()->first();
        $response = $this->get('/api/escape-rooms/' . $random->id . '/time-slots', $this->header);
        $response->assertStatus(200);
    }
}
