<?php

namespace Tests;

use App\Models\Bookings;
use App\Models\TimeSlots;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $header = array();

    protected function setUp(): void
    {
        parent::setUp();
        $data = [
            "email" => "user@user.com",
            "password" => "password"
        ];
        $response = $this->post('/api/getToken', $data);
        $token = $response->json()['data'];

        $this->header = [
            'Authorization' => $token
        ];


        if (Bookings::count() == 0) {
            $random = TimeSlots::inRandomOrder()->first();
            $data = [
                "escape_room_id" => $random->escape_room_id,
                "time_slot_id" => $random->id,
                "num_participants" => 1,
            ];
            $response = $this->post('/api/bookings', $data, $this->header);
        }
    }
}
