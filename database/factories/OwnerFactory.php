<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\Province;
use App\Models\SubArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
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
            // 'ppassword' => bcrypt('123456'),
            'phone' => '0915477451',
            // 'bank_id' =>
            'subarea_id' => SubArea::get()->random()->id,
            'iban_number' => $this->faker->randomNumber(),
            'id_number' =>  $this->faker->randomNumber(),
            'province_id' =>  Province::get()->random()->id,
            'bank_id' => Bank::get()->random()->id,
        ];
    }
}
