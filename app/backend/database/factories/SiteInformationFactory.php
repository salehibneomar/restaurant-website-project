<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Local Restaurant',
            'email' => 'myrestaurant@gmail.com',
            'phone' => '01711223344',
            'about' => $this->faker->text(200),
            'address' => 'Dhaka 1212, Gulshan Model Town',
            'icon'  => 'will added',
            'banner' => 'will be added',
        ];
    }
}
