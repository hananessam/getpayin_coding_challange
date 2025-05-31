<?php

// user can create a post
namespace Tests\Feature\Api\Posts;
use App\Enums\PostStatus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('user can create an immediate post', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $response = $this->actingAs($user, 'sanctum')->postJson('/api/posts', [
        'title' => 'Test Post',
        'content' => 'This is a test post content.',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['post' => [
            'id',
            'title',
            'content',
            'created_at',
            'updated_at'
        ]]);

    $this->assertDatabaseHas('posts', [
        'title' => 'Test Post',
        'content' => 'This is a test post content.',
        'user_id' => $user->id,
    ]);
});

test('user can create a scheduled post', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $response = $this->actingAs($user, 'sanctum')->postJson('/api/posts', [
        'title' => 'Scheduled Post',
        'content' => 'This is a scheduled post content.',
        'scheduled_time' => now()->addMinutes(10)->toISOString(), // Schedule for 10 minutes later
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['post' => [
            'id',
            'title',
            'content',
            'created_at',
            'updated_at'
        ]]);

    $this->assertDatabaseHas('posts', [
        'title' => 'Scheduled Post',
        'content' => 'This is a scheduled post content.',
        'user_id' => $user->id,
    ]);
});

test('user can create a draft post', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $response = $this->actingAs($user, 'sanctum')->postJson('/api/posts', [
        'title' => 'Draft Post',
        'content' => 'This is a draft post content.',
        'is_draft' => true,
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['post' => [
            'id',
            'title',
            'content',
            'created_at',
            'updated_at'
        ]]);

    $this->assertDatabaseHas('posts', [
        'title' => 'Draft Post',
        'content' => 'This is a draft post content.',
        'user_id' => $user->id,
        'status' => PostStatus::DRAFT
    ]);
});