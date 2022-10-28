<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->name(),
            'lname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'degree' => \Str::random(10),
            'source' => \Str::random(10),
            'field' => \Str::random(20),
            'type' => rand(0, 1) ? 'Honorary' : 'Professional',
            'sub_type' => rand(0, 1) ? 'Research' : 'Exam'
        ];
    }
}
