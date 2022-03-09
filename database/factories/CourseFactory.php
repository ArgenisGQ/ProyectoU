<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique->word(50);
        $code = $this->faker->bothify('cod###???');
        $section = $this->faker->bothify('sec###???');

        return [
            //
            'id_sima' => $this->faker->unique()->numberBetween(10,499),
            'id_continua' => $this->faker->unique()->numberBetween(10,499),
            'id_sima_doc' => $this->faker->unique()->numberBetween(10,499),
            'id_continua_doc' => $this->faker->unique()->numberBetween(10,499),
            'id_dpto' => $this->faker->unique()->numberBetween(10,499),
            'id_faculty' => $this->faker->unique()->numberBetween(10,499),

            'name' => $name,
            'code' => $code,
            'section' => $section,
            'slug' => Str::slug($code),
            'color' => $this->faker->randomElement(['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink'])
        ];
    }
}
