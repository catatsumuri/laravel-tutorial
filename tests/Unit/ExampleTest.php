<?php

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('trueはtrueである', function () {
    expect(true)->toBeTrue();
});