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
            'name' => 'Administrador - Analista02 - DeaD',
            'ced' => '01',
            'email' => 'dead.analista02@uny.edu.ve',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Administrador - DEMTec',
            'ced' => '02',
            'email' => 'admin@uny.edu.ve',
            'password' => bcrypt('admin')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Usuario - DEMTec',
            'ced' => '03',
            'email' => 'usuario@uny.edu.ve',
            'password' => bcrypt('usuario')
        ])->assignRole('Profesor');

        User::factory(99)->create();

    }
}
