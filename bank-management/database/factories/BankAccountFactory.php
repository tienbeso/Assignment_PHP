<?php

namespace Database\Factories;

use App\Models\BankAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static int $sequence = 0;
    public function definition(): array
    {
        $step = 500_000_000 / 49 ;
        $balance = round(self::$sequence * $step, 2);
        self::$sequence++;
        return [
            'account_number' => $this->faker->unique()->numerify('##########'),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => '0'. $this->faker->numerify('#########'),
            'balance' => $balance,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'created_at' => now(),
        ];
    }
}
