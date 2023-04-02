<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAddressTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_gets_a_validation_error_if_address_is_empty()
    {    

        $response = $this->json('POST', '/api/V1/user/address', []);
        $response
            ->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'data'
            ])
            ->assertJson([
                'message' => "The given data was invalid.",
                'data' => [
                    "address" => [
                        "The address field is required."
                    ],
                ]
            ]);
    }

}
