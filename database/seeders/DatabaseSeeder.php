<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Tag;
use App\Models\Departament;
use App\Models\Evaluation;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);

        $this->call(EvaluationSeeder::class);

        Faculty::factory(4)->create();
        Course::factory(0)->create();
        $this->call(ActivitySeeder::class);


        $this->call(PeriodSeeder::class);

        $this->call(Category_permissionSeeder::class);

        $this->call(DepartamentSeeder::class);



    }
}
