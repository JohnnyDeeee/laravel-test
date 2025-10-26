<?php

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\getJson;
use function Pest\Laravel\patchJson;
use function Pest\Laravel\post;
use function Pest\Laravel\postJson;

test('should return all coffees', function() {
    // Arrange

    // Act
    $response = getJson('/api/coffee');

    // Assert
    $response->assertStatus(200);
});

test('should create a coffee and return it', function() {
    // Arrange
    $data = [
        'name' => 'Some name',
        'origin' => 'some origin',
        'roast_date' => '01-01-2020',
        'stock' => 12
    ];

    // Act
    $response = postJson('/api/coffee', $data);

    // Assert
    $response
    ->assertStatus(201)
    ->assertJson([
        ...$data
    ]);
});

test('should update coffee and return it', function() {
    // Arrange
    $data = [
        'name' => 'Some name 1234',
        'origin' => 'some origin 1234',
        'roast_date' => '01-01-2029',
        'stock' => 12
    ];

    // Act
    $response = patchJson('/api/coffee/1', $data);

    // Assert
    $response
    ->assertStatus(200)
    ->assertJson([
        ...$data
    ]);
});

test('should delete coffee', function() {
    // Arrange

    // Act
    $response = delete('/api/coffee/1');

    // Assert
    $response->assertStatus(200);
})->only();
