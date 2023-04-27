<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TokenControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_token(): void
    {
        $data = [
            "email" => "user@user.com",
            "password" => "password"
        ];
        $response = $this->post('/api/getToken',$data);
        $response->assertStatus(200);
    }
}
