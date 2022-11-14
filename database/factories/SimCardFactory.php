<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SimCard>
 */
class SimCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /** @var Account $account */
        $account = Account::inRandomOrder()->first();

        return [
            'account_id' => $account->id,
            'phone'      => $this->faker->phoneNumber,
            'imei'       => $this->faker->imei,
            'iccid'      => $this->faker->numerify('###############'),
            'is_active'  => true,
            'notes'      => null,
            'created_at' => now(),
        ];
    }
}
