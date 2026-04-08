<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('ゲストがアクセスできるページにJavaScriptエラーがない', function () {
    $pages = visit([
        route('home'),
        route('login'),
        route('register'),
        route('password.request'),
    ]);

    $pages->assertNoSmoke();
});

test('認証済みユーザーがアクセスできるページにJavaScriptエラーがない', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $pages = visit([
        route('dashboard'),
        route('profile.edit'),
        route('security.edit'),
        route('appearance.edit'),
    ]);

    $pages->assertNoSmoke();
});
