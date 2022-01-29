<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'website_title' => $this->faker->domainWord(),
            'website_url' => $this->faker->unique()->domainName()
        ];
    }
}
