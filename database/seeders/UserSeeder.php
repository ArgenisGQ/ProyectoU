<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            /* 'id_sima' => '1',
            'id_continua' => '1', */
            'name' => 'Control de Calidad',
            'lastName' => 'DEMTec',
            'userName' => 'Calidad',
            'ced' => '01',
            'email' => 'dead.analista05@uny.edu.ve',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            /* 'id_sima' => '2',
            'id_continua' => '2', */
            'name' => 'Administrador',
            'lastName' => 'DEMTec',
            'userName' => 'Admin',
            'ced' => '02',
            'email' => 'admin@uny.edu.ve',
            'password' => bcrypt('admin')
        ])->assignRole('Admin');

        User::create([
            /* 'id_sima' => '3',
            'id_continua' => '3', */
            'name' => 'Usuario',
            'lastName' => 'DEMTec',
            'userName' => 'usuario',
            'ced' => '03',
            'email' => 'usuario@uny.edu.ve',
            'password' => bcrypt('usuario')
        ])->assignRole('Profesor');

        User::factory(5)->create();

    }
}
