<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            // 'password' => bcrypt('123456'),
            'phone' => '0915477450',
            'subarea_id' => 1,
            'province_id' => 1,
            'phone' => '0915477450',
            'id_number' => '0915477450',
            'id_type' => 'passport',
            'phone' => '0915477450',
            'note' => 'hello',
            'nationalaity_id' => 1,
        ];
    }
}