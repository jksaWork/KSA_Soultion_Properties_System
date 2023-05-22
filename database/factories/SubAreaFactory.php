<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubAreaFactory extends Factory
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
            'area_id' => Area::get()->random()->id,
            'province_id' => Province::get()->random()->id,
        ];
    }
}
