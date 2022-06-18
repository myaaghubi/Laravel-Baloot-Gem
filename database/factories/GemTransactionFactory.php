<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\GemTransactionTagEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GemTransaction>
 */
class GemTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // ------- get tags as an array
        $ref = new \ReflectionClass('App\Enums\GemTransactionTagEnum');
        $tags = $ref->getConstants();
        // ------- get tags as an array
        
        return [
            'gem_id' => 0, // should to fill with seeder
            'title' => $this->faker->text(25),
            'amount' => $this->faker->randomDigit,
            'tag' => $tags[array_rand($tags)],
        ];
    }
}
