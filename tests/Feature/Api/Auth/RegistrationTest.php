<?php

test('new users can register', function () {
    $response = $this->post('/api/auth/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    // Assert that the user is created in the database
    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
    ]);

    // Assert the status
    $response->assertStatus(201);

    // Assert the response structure
    $response->assertJson([
        'user' => [
            'id' => true,
            'email' => 'test@example.com',
            'name' => 'Test User',
        ],
        'token' => true,
    ]);
});