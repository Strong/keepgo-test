<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    private static bool $wasCalled = false;
    protected static User $user;

    public function setUp(): void
    {
        parent::setUp();

        if (!self::$wasCalled) {
            Artisan::call('migrate:fresh --seed');

            static::$user = User::where('email', DatabaseSeeder::USER_EMAIL)->first();

            self::$wasCalled = true;
        }
    }
}
