<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Image;

use Illuminate\Database\Seeder;
use Illuminate\Notifications\Action;
use Illuminate\Support\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $activities = Activity::factory(300)->create();


        foreach ($activities as $activity) {
            Image::factory(1)->create([
                'imageable_id' => $activity->id,
                'imageable_type' => Activity::class
            ]);
            $activity->courses()->attach([
                rand(1,4),
                rand(5,8)
            ]);
            $activity->academic_start = Carbon::create('2022', '5', '5', '0',' 0','0');

            $activity->academic_finish = Carbon::create(2022, 9, 9, 0, 0, 0);
        }
    }
}
