<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'app_name' => 'Lexical Pay',
            'email' => 'support@lexicalpay.com',
            'currency' => '&#8358;',
            'referral_worth' => 1000.00,
            'welcome_bonus' => 500.00,
            'sponsored_post' => 100.00,
        ];
    }
}
