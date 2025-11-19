<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user can access login form
     */
    public function test_user_can_access_login_form()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('user.auth.login');
    }

    /**
     * Test user can access register form
     */
    public function test_user_can_access_register_form()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertViewIs('user.auth.register');
    }

    /**
     * Test user can register successfully
     */
    public function test_user_can_register()
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name' => 'Test User',
        ]);
        $this->assertAuthenticatedAs(User::where('email', 'test@example.com')->first());
    }

    /**
     * Test user cannot register with invalid data
     */
    public function test_user_cannot_register_with_invalid_email()
    {
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /**
     * Test user cannot register with duplicate email
     */
    public function test_user_cannot_register_with_duplicate_email()
    {
        User::create([
            'name' => 'Existing User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /**
     * Test user can login with valid credentials
     */
    public function test_user_can_login()
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs(User::where('email', 'test@example.com')->first());
    }

    /**
     * Test user cannot login with invalid credentials
     */
    public function test_user_cannot_login_with_invalid_credentials()
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test user can logout
     */
    public function test_user_can_logout()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->actingAs($user)->post(route('logout'));

        $response->assertRedirect(route('home'));
        $this->assertGuest();
    }

    /**
     * Test guest user cannot access logout
     */
    public function test_guest_cannot_access_logout()
    {
        $response = $this->post(route('logout'));

        // Should redirect to login since logout requires auth middleware
        $response->assertStatus(302);
    }

    /**
     * Test authenticated user cannot access login page
     */
    public function test_authenticated_user_cannot_access_login_page()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->actingAs($user)->get(route('login'));

        // Should redirect to home since login page uses 'guest' middleware
        $response->assertStatus(302);
    }

    /**
     * Test authenticated user cannot access register page
     */
    public function test_authenticated_user_cannot_access_register_page()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->actingAs($user)->get(route('register'));

        // Should redirect to home since register page uses 'guest' middleware
        $response->assertStatus(302);
    }
}
