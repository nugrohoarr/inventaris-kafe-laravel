<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $response = $this->post('/users', [
            'nama' => 'John Doe',
            'username' => 'johndoe',
            'password' => 'secret',
            'level' => 'admin',
        ]);

        $response->assertStatus(302); // Redirect status
        $this->assertDatabaseHas('users', [
            'nama' => 'John Doe',
            'username' => 'johndoe',
            // 'password' should be hashed, so not checking it directly
            'level' => 'admin',
        ]);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $response = $this->put('/users/' . $user->id, [
            'nama' => 'Jane Doe',
            'username' => 'janedoe',
            'password' => 'newsecret',
            'level' => 'user',
        ]);

        $response->assertStatus(302); // Redirect status
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama' => 'Jane Doe',
            'username' => 'janedoe',
            // 'password' should be hashed, so not checking it directly
            'level' => 'user',
        ]);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();

        $response = $this->delete('/users/' . $user->id);

        $response->assertStatus(302); // Redirect status
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    /** @test */
    public function it_can_retrieve_all_users()
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get('/users');

        $response->assertStatus(200);
        $response->assertViewHas('users', function ($viewUsers) use ($users) {
            return $viewUsers->count() === $users->count();
        });
    }
}
