<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => $this->faker->name(),
            'value' => [
               'content' => [
                   'en' => $this->faker->text(),
                    'ar' => $this->faker->text()
               ],
            ],
        ];
    }

}
