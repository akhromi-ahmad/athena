<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;    // reset database every test will start

    /** @test */
    public function test_user_can_login_with_correct_credentials()
    {
        // create dummy user data
        $user = User::create([
            'username' => 'JohnDoe456',
            'password' => 'Rahasia123!',
        ]);

        // send post request to login route
        $response = $this->post(route('user.login'), [
            'username' => 'JohnDoe456',
            'password' => 'Rahasia123!',
        ]);

        // assert redirect to product page after success login
        $response->assertRedirect(route('products'));

        // assert user already authenticated
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function test_user_cannot_login_with_incorrect_password()
    {
        // create dummy user data
        $user = User::create([
            'username' => 'JohnDoe456',
            'password' => 'Rahasia123!',
        ]);

        // send post request to login route with incorrect password
        $response = $this->post(route('user.login'), [
            'username' => 'JohnDoe456',
            'password' => 'PasswordSalah123',
        ]);

        // assert redirect to login page after failed login
        $response->assertStatus(302);

        // assert show error session 'invalid credentials'
        $response->assertSessionHas('error', 'invalid credentials');

        // assert user is guest (not authenticated)
        $this->assertGuest();
    }
}
