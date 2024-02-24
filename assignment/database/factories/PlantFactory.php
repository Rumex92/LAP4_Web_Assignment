<?php
namespace Database\Factories;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlantFactory extends Factory

    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        protected $model = \App\Models\plantlist::class;
    
        public function definition(): array
        {
            return [
                'name' => $this->faker->text(20),
            ];
        }
    }

