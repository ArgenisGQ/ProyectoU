<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluation;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evaluation::create([
            'name' => 'Formativa'
        ]);

        Evaluation::create([
            'name' => 'Diagnostico'
        ]);

        Evaluation::create([
            'name' => 'Sumativa'
        ]);

        /* Evaluation::factory(25)->create(); */
    }
}
