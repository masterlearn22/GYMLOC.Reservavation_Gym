<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    #[Test]
    public function it_displays_profile_page()
    {
        $response = $this->actingAs($this->user)->get(route('profile.index'));
        $response->assertStatus(200);
    }

    #[Test]
    public function it_displays_edit_profile_page()
    {
        $response = $this->actingAs($this->user)->get(route('profile.edit', $this->user->id_user));
        $response->assertStatus(200);
    }

    #[Test]
    public function it_displays_transaction_history()
    {
        Transaksi::factory()->create(['id_user' => $this->user->id_user]);
        
        $response = $this->actingAs($this->user)->get(route('transaksi'));
        $response->assertStatus(200);
    }

    #[Test]
    public function it_updates_user_profile()
    {
        $response = $this->actingAs($this->user)->put(route('profile.update', $this->user->id_user), [
            'name' => 'Updated Name',
            'username' => 'updatedusername',
            'email' => 'updated@example.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword'
        ]);

        $response->assertRedirect(route('profile.index', $this->user->id_user));
        $this->assertDatabaseHas('users', ['name' => 'Updated Name', 'username' => 'updatedusername']);
    }

    #[Test]
    public function it_updates_user_profile_photo()
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('profile.jpg');

        $response = $this->actingAs($this->user)->post(route('profile.edit', $this->user->id_user), [
            'profile_photo' => $file,
        ]);

        $response->assertRedirect(route('profile.index', $this->user->id_user));
        Storage::disk('public')->assertExists('profile_photos/' . $file->hashName());
    }


    #[Test]
    public function it_deletes_user_account()
    {
        $response = $this->actingAs($this->user)->post(route('profile.deleteAccount'), [
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseMissing('users', ['id_user' => $this->user->id_user]);
    }
}