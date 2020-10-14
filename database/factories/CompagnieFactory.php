<?php

namespace Database\Factories;

use App\Models\Compagnia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompagniaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Compagnia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->company,
            'indirizzo_web' => $this->faker->unique()->url,
            'contatto' => $this->faker->name(null),
        ];
    }
}
