<?php

namespace Database\Factories;

use App\Models\Consegna;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConsegnaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consegna::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'soprannome' => $this->faker->unique()->firstName,
            'nome' => $this->faker->company,
            'indirizzo' => $this->faker->streetName,
            'cap' => $this->faker->postcode,
            'luogo' => $this->faker->city,
            'provincia' => $this->faker->stateAbbr,
            'numero' => $this->faker->buildingNumber,
            'stato' => $this->faker->country,
            'telefono1' => $this->faker->e164PhoneNumber ,
            'telefono2' => $this->faker->e164PhoneNumber,
            'mobile' => $this->faker->e164PhoneNumber,
            'fax' => $this->faker->e164PhoneNumber,
            'mail' => $this->faker->email,
            'piva' => $this->faker->ean13
        ];
    }
}
