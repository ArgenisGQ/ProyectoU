<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $periods = Period::factory(1)->create();


        /* foreach ($periods as $period) {

            $period->name()->save('2021-3');

        } */

        /* $periods->name()->save('2021-3'); */

        /* DB::table('periods')->insert([
            'name' => '2021-3',
        ]); */
    }
}
