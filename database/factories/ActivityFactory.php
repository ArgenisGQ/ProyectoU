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
        $startDate = Carbon::create(2021, 9, 6, 0, 0, 0);
        $endDate = Carbon::create(2021, 12, 17, 0, 0, 0);

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
            'lapse_in' => $this->faker->dateTimeBetween($startDate,$endDate),
            'lapse_out' => $this->faker->dateTimeBetween($startDate,$endDate)
            /* 'lapse_in' => Carbon::create(2022, 6, 1, 0, 0, 0), */
            /* 'lapse_out' => Carbon::create(2022, 9, 25, 0, 0, 0) */
        ];
    }
}

