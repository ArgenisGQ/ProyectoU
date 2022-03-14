<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FacultyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faculty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->unique->word(20);

        return [
            //
            'name' => $name,
            'slug' => Str::slug($name),

            'id_sima_faculty' => $this->faker->unique()->numberBetween(1,30),
            'id_continua_faculty' => $this->faker->unique()->numberBetween(1,30),
        ];
    }
}
