<?php

namespace Database\Factories;

use App\Models\Departament;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class DepartamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique->word(20);

        return [
            'name' => $name,
            'slug' => Str::slug($name),

            'id_sima' => $this->faker->unique()->numberBetween(10,499),
            'id_continua' => $this->faker->unique()->numberBetween(10,499),
            'id_sima_faculty' => $this->faker->unique()->numberBetween(10,499),
            'id_continua_faculty' => $this->faker->unique()->numberBetween(10,499),

        ];
    }
}
