<?php

namespace Database\Seeders;

use App\Models\Category_Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category_permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Category_Permission::create([
            'id'   => 1,
            'name' => 'uno',
        ]);
        Category_Permission::create([
            'id'   => 2,
            'name' => 'dos',
        ]); */

        DB::table('categories_permissions')->insert([
            'name' => 'DASHBOARD',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'USUARIOS',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'CATEGORIAS',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'ETIQUETAS',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'ARTICULOS',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'ACTIVIDADES USUARIOS',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'ACTIVIDADES ADMIN',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'IMPRIMIR PDF',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'FACULTADES',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'MATERIAS',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'ROLES',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'PERIODOS',
        ]);
        DB::table('categories_permissions')->insert([
            'name' => 'IMPORTAR PROFESORES',
        ]);

    }
}
