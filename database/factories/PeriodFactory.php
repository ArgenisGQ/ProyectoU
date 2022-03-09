<?php

namespace Database\Factories;

use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class PeriodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Period::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* $name = $this->faker->unique()->sentence(); */

        return [
            //
            /* 'name' => $name, */
            'name' => '2021-3',
            /* 'slug' => Str::slug($name), */
            /* 'activity_type' => $this->faker->text(50), */
            /* 'extract' => $this->faker->text(250), */
            /* 'extract01' => $this->faker->text(250), */
            /* 'body' => $this->faker->text(2000), */
            /* 'status' => $this->faker->randomElement([1,2]), */
            /* 'faculty_id' => Faculty::all()->random()->id, */
            /* 'user_id' => User::all()->random()->id, */
            'status' => '1',
            'academic_start' => Carbon::create(2021, 9, 6, 0, 0, 0),
            'academic_finish' => Carbon::create(2021, 12, 17, 0, 0, 0)

        ];
    }
}
