<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $countryIdMax;
        is_null($countryIdMax) && $countryIdMax = Country::max('id');

        return [
            'country_id' => rand(1, $countryIdMax),
            'name' => $this->faker->city()
        ];
    }
}
