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
            'username' => 'John_Doe',
            'password' => 'John_Doe123',
        ];

        $response = $this->post('/signup', $data);
        $response->assertStatus(302);
        $response->assertRedirect('/products');

        $this->assertDatabaseHas('users', [
            'username' => 'John_Doe',
        ]);
    }
}
