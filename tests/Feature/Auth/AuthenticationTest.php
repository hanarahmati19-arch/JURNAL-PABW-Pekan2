<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Database\Seeders\PetugasSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
        $response->assertSee('Email');
        $response->assertSee('Password');
    }

    public function test_users_can_register_with_a_hashed_password(): void
    {
        $response = $this->post('/register', [
            'name' => 'Petugas Baru',
            'email' => 'baru@bpbd.go.id',
            'password' => 'Petugas123!',
            'password_confirmation' => 'Petugas123!',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'baru@bpbd.go.id']);
        $this->assertDatabaseMissing('users', ['password' => 'Petugas123!']);
        $response->assertRedirect(route('laporan.daftar', absolute: false));
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('laporan.daftar', absolute: false));
    }

    public function test_seeded_bpbd_admin_can_log_in(): void
    {
        $this->seed(PetugasSeeder::class);

        $this->assertDatabaseCount('users', 6);

        $response = $this->post('/login', [
            'email' => 'admin@bpbd.go.id',
            'password' => 'AdminBPBD123!',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('laporan.daftar', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
