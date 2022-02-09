<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mood;

class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'notes' => $this->faker->realText($maxNbChars = 300),
            'mood_id' => Mood::inRandomOrder()->value('id'),
        ];
    }
}
