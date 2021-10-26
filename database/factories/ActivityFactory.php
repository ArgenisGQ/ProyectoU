<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();

        return [
            //
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(250),
            'extract01' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1,2]),
            'faculty_id' => Faculty::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
