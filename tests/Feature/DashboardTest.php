<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('ゲストはログインページにリダイレクトされる', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('認証済みユーザーはダッシュボードにアクセスできる', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertOk();
});