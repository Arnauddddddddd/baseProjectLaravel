<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_register_with_valid_data(): void
    {
        $response = $this->postJson('/api/v1/auth/register', 
        [
            'name' => 'NewUser',
            'email' => 'newuser@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email'
            ],
            'token'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'newuser@example.com'
        ]);
    }
}
