<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first-name' => $this->faker->firstName,
            'last-name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'company_id' => Company::factory(),
            'phone-number' => $this->faker->phoneNumber
        ];
    }
}
