<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Persona;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'per_nombre' => $this->faker->name,
            'per_appm' => $this->faker->lastName,
            'per_prof' => $this->faker->jobTitle,
            'per_telf' => $this->faker->phoneNumber,
            'per_cel' => $this->faker->phoneNumber(),
            'per_email' => $this->faker->unique()->email,
            'per_dir' => $this->faker->address,
            'per_fnac' => $this->faker->date,
            'per_lnac' => $this->faker->city,
            'per_estado' => $this->faker->boolean,
            'per_content' => $this->faker->text,
        ];
    }
}
