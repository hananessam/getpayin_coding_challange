<?php

test('get available platforms', function () {
    $response = $this->get('/api/platforms');

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'name',
                'type',
            ],
        ],
    ]);
});