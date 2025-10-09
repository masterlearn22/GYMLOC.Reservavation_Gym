<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Seed the roles
        $this->seed(RoleSeeder::class);
    }

    #[Test]
    public function user_can_register_successfully()
    {
        $response = $this->post('/simpanregist', [ // Change to /simpanregist
            'username' => 'john_doe',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('login'); // Harus redirect ke halaman login
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    #[Test]
    public function registration_requires_all_fields()
    {
        $response = $this->post('/simpanregist', []); // Change to /simpanregist

        $response->assertSessionHasErrors(['username', 'name', 'email', 'password']);
    }

    #[Test]
    public function user_can_login_with_correct_credentials()
    {
        // Create user first
        $user = User::create([
            'username' => 'john_doe',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Perform login
        $response = $this->post('/simpanlogin', [ // Change to /simpanlogin
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/'); // Harus redirect ke homepage
        $this->assertAuthenticatedAs($user);
    }

    #[Test]
    public function user_cannot_login_with_wrong_password()
    {
        $user = User::create([
            'username' => 'john_doe',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/simpanlogin', [ // Change to /simpanlogin
            'email' => 'john@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors(); // Pastikan ada error
        $this->assertGuest(); // User tidak boleh login
    }

    #[Test]
    public function authenticated_user_can_logout()
    {
        $user = User::create([
            'username' => 'john_doe',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        $this->actingAs($user); // Login sebagai user

        $response = $this->post('/logout');

        $response->assertRedirect('login'); // Harus redirect ke login
        $this->assertGuest(); // Pastikan user sudah logout
    }
}