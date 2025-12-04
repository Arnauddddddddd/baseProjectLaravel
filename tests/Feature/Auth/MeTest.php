<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use Laravel\Sanctum\Sanctum;


class MeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_me_returns_authenticated_user_when_token_is_valid(): void
    {
        $response = $this->get('/');
        $user = User::factory()->create([
            'name' => 'TestUser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password123')
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        $response = $this
        ->withHeaders(['Authorization' => 'Bearer ' . $token,])
        ->get('/api/v1/auth/me');

        $response->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'name' => 'TestUser',
                'email' => 'testuser@example.com',
            ]);
    }

    public function test_me_returns_unauthorized_when_token_is_invalid(): void
    {
        $response = $this->getJson('/api/v1/auth/me');
        $response->assertStatus(401);
    }
}