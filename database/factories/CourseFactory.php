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
        $turma = $code.' '.$section;

        return [
            //



            'name' => $name,
            'code' => $code,
            'section' => $section,
            'slug' => Str::slug($code),
            'color' => $this->faker->randomElement(['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink']),
            'turma' => $turma,

        ];
    }
}
