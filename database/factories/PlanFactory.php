<?php

namespace Database\Factories;

use App\Enums\PlanInterval;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plan>
 */
class PlanFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'           => 'Basic Plan',
            'price'          => 30,
            'interval'       => PlanInterval::MONTHLY,
            'interval_count' => 1,
        ];
    }
}
