<?php

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('正常なレスポンスを返す', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
});