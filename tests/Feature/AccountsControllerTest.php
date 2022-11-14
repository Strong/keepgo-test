<?php

namespace Tests\Feature;

use App\Http\Controllers\AccountsController;
use App\Models\Account;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountsControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @see AccountsController::sendSms()
     */
    public function test_account_send_sms(): void
    {
        /** @var Account $account */
        $account = Account::inRandomOrder()->first();

        $response = $this->actingAs(self::$user)->postJson('/api/v1/accounts/'.$account->id.'/send-sms', [
            'text' => $this->faker->text(120),
        ]);

        $response->assertOk();
    }
}
