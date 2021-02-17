<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\{RegionsTableSeeder, UsersTableSeeder};
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(RegionsTableSeeder::class);
        $this->seed(UsersTableSeeder::class);
        $this->user = User::first();
    }

    public function testIndex()
    {
        $response = $this->get(route('users.index'));
        $response->assertOk();
    }

    public function testShow()
    {
        $response = $this->get(route('users.show', $this->user));
        $response->assertOk();
    }

    public function testEdit()
    {
        $response = $this->get(route('users.edit', $this->user));
        $response->assertForbidden();
    }

    public function testUpdate()
    {
        $this->user->name = 'New';
        $data = $this->user->toArray();
        $response = $this->patch(route('users.update', $this->user), $data);
        $response->assertSessionHasNoErrors();
        $response->assertForbidden();
        $this->assertDatabaseMissing('users', $data);
    }

    public function testEditWithAuthentication()
    {
        $response = $this->actingAs($this->user)->get(route('users.edit', $this->user));
        $response->assertOk();
    }

    public function testUpdateWithAuthentication()
    {
        $this->user->name = 'New';
        $data = $this->user->only("name", "email", "region_id");
        $response = $this->actingAs($this->user)->patch(route('users.update', $this->user), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('users', $data);
    }
}
