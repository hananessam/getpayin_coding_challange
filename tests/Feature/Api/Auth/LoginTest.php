<?php

test('users can login', function () {
    // Create a user
    $user = \App\Models\User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    // Assert the status
    $response->assertStatus(200);

    // Assert the response structure
    $response->assertJson([
        'user' => [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
        ],
        'token' => true,
    ]);
});
