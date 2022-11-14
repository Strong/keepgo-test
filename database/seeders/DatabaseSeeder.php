<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use App\Models\SimCard;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public const USER_EMAIL = 'admin@keepgo-test.localhost';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => self::USER_EMAIL,
        ]);

        /** @var Collection<int, Account> $account */
        $accounts = Account::factory()->create();

        /** @var Collection<int, SimCard> $simCards */
        $simCards = SimCard::factory(15)->create();
    }
}
