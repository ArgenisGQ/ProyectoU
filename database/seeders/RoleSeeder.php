<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])->syncRoles($role1, $role2);

        /* USUARIOS */
        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.create',
                            'description' => 'Crear usuario *REVISAR'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->syncRoles($role1);


        /* CATEGORIAS */
        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'Ver listado de categorias'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Crear Categoria'])->syncRoles($role1);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Editar categoria'])->syncRoles($role1);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Eliminar categoria'])->syncRoles($role1);


        /* ETIQUETAS */
        Permission::create(['name' => 'admin.tags.index',
                            'description' => 'Ver listado de etiquetas'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.tags.create',
                            'description' => 'Crear etiqueta'])->syncRoles($role1);
        Permission::create(['name' => 'admin.tags.edit',
                            'description' => 'Editar etiqueta'])->syncRoles($role1);
        Permission::create(['name' => 'admin.tags.destroy',
                            'description' => 'Eliminar etiqueta'])->syncRoles($role1);


        /* ARTICULOS */
        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'Ver listado de posts'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Crear post'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Editar post'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Eliminar post'])->syncRoles($role1, $role2);


        /* ACTIVIDADES */
        Permission::create(['name' => 'admin.activities.index',
                            'description' => 'Ver listado de actividades'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.create',
                            'description' => 'Crear actividad'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.edit',
                            'description' => 'Editar actividad'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.destroy',
                            'description' => 'Eliminar actividad'])->syncRoles($role1, $role2);


        /* IMPRIMIR PDF */
        Permission::create(['name' => 'activities.pdf.down',
                            'description' => 'Bajar PDF de actividades'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'activities.pdf.show',
                            'description' => 'Mostrar/Bajar PDF de actividades'])->syncRoles($role1,$role2);


        /* FACULTADES */
        Permission::create(['name' => 'admin.faculties.index',
                            'description' => 'Ver listado de facultades'])->syncRoles($role1);
        Permission::create(['name' => 'admin.faculties.create',
                            'description' => 'Crear facultad'])->syncRoles($role1);
        Permission::create(['name' => 'admin.faculties.edit',
                            'description' => 'Editar facultad'])->syncRoles($role1);
        Permission::create(['name' => 'admin.faculties.destroy',
                            'description' => 'Eliminar facultad'])->syncRoles($role1);


        /* MATERIAS */
        Permission::create(['name' => 'admin.courses.index',
                            'description' => 'Ver listado de materias'])->syncRoles($role1);
        Permission::create(['name' => 'admin.courses.create',
                            'description' => 'Crear materia'])->syncRoles($role1);
        Permission::create(['name' => 'admin.courses.edit',
                            'description' => 'Editar materia'])->syncRoles($role1);
        Permission::create(['name' => 'admin.courses.destroy',
                            'description' => 'Eliminar materia'])->syncRoles($role1);

        /* ROLES */
        Permission::create(['name' => 'admin.roles.index',
                            'description' => 'Ver listado de roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Crear roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Editar roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Eliminar roles'])->syncRoles($role1);


        /* PERIODOS */
        Permission::create(['name' => 'admin.periods.index',
                            'description' => 'Ver listado de periodos'])->syncRoles($role1);
        Permission::create(['name' => 'admin.periods.create',
                            'description' => 'Crear periodos'])->syncRoles($role1);
        Permission::create(['name' => 'admin.periods.edit',
                            'description' => 'Editar periodos'])->syncRoles($role1);
        Permission::create(['name' => 'admin.periods.destroy',
                            'description' => 'Eliminar periodos'])->syncRoles($role1);


         /* IMPORTAR PROFESORES */
        Permission::create(['name' => 'admin.import',
                    'description' => 'Importar listado de Profesores'])->syncRoles($role1);

    }
}
