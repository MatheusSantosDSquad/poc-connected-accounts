<?php

namespace Database\Factories;

use App\Enums\FeeType;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => $this->faker->company,
            'email'    => $this->faker->email,
            'fee'      => $this->faker->numberBetween(1, 10),
            'fee_type' => FeeType::random(),
        ];
    }
}
