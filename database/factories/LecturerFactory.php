<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nidn' => '1234567890',
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('dosen123'),
            'address' => $this->faker->address,
        ];
    }
}
