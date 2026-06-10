<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SignUpTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_allows_users_to_sign_up()
    {
        $data = [
            'username' => 'JohnDoe',
            'password' => 'JohnDoe123',
        ];

        $response = $this->post('/signup', $data);
        $response->assertStatus(302);
        $response->assertRedirect(route('login'));

        $this->assertDatabaseHas('users', [
            'username' => 'JohnDoe',
        ]);
    }
}
