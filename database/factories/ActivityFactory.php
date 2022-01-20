<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

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
            'activity_type' => $this->faker->text(50),
            'extract' => $this->faker->text(250),
            'extract01' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1,2]),
            'faculty_id' => Faculty::all()->random()->id,
            'user_id' => User::all()->random()->id,
            /* 'academic_start' => Carbon::create(2022, 6, 1, 0, 0, 0), */
            /* 'academic_finish' => Carbon::create(2022, 9, 25, 0, 0, 0) */
        ];
    }
}

