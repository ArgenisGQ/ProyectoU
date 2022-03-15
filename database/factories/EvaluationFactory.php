<?php

namespace Database\Factories;

use App\Models\Evaluation;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evaluation::class;

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
            'description' => $this->faker->text(15),
        ];
    }
}
