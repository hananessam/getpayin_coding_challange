<?php

test('users can logout', function () {
    // Create a user
    $user = \App\Models\User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/api/auth/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $token = $response->json('token');

    $response = $this->withHeaders([
        'Authorization' => 'Bearer ' . $token,
    ])->post('/api/auth/logout');

    // Assert the status
    $response->assertStatus(200);

    // Assert the response structure
    $response->assertJson([
        'message' => __('auth.logout'),
    ]);
});
