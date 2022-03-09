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
        $role2 = Role::create(['name' => 'Profesor']);

        /* DASHBOARD */
        Permission::create(['name' => 'admin.home',
                            'group_id' => 1,
                            'description' => 'Ver el dashboard'])->syncRoles($role1, $role2);

        /* USUARIOS */
        Permission::create(['name' => 'admin.users.index',
                            'group_id' => 2,
                            'description' => 'Ver listado de usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.show',
                            'group_id' => 2,
                            'description' => 'Ver datos de usuario'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.create',
                            'group_id' => 2,
                            'description' => 'Crear usuario *REVISAR'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.edit',
                            'group_id' => 2,
                            'description' => 'Editar usuario'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.destroy',
                            'group_id' => 2,
                            'description' => 'Eliminar usuario'])->syncRoles($role1);


        /* CATEGORIAS */
        Permission::create(['name' => 'admin.categories.index',
                            'group_id' => 3,
                            'description' => 'Ver listado de categorias'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.categories.show',
                            'group_id' => 3,
                            'description' => 'Ver datos de categoria'])->syncRoles($role1);
        Permission::create(['name' => 'admin.categories.create',
                            'group_id' => 3,
                            'description' => 'Crear Categoria'])->syncRoles($role1);
        Permission::create(['name' => 'admin.categories.edit',
                            'group_id' => 3,
                            'description' => 'Editar categoria'])->syncRoles($role1);
        Permission::create(['name' => 'admin.categories.destroy',
                            'group_id' => 3,
                            'description' => 'Eliminar categoria'])->syncRoles($role1);


        /* ETIQUETAS */
        Permission::create(['name' => 'admin.tags.index',
                            'group_id' => 4,
                            'description' => 'Ver listado de etiquetas'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.tags.show',
                            'group_id' => 4,
                            'description' => 'Ver datos de etiqueta'])->syncRoles($role1);
        Permission::create(['name' => 'admin.tags.create',
                            'group_id' => 4,
                            'description' => 'Crear etiqueta'])->syncRoles($role1);
        Permission::create(['name' => 'admin.tags.edit',
                            'group_id' => 4,
                            'description' => 'Editar etiqueta'])->syncRoles($role1);
        Permission::create(['name' => 'admin.tags.destroy',
                            'group_id' => 4,
                            'description' => 'Eliminar etiqueta'])->syncRoles($role1);


        /* ARTICULOS */
        Permission::create(['name' => 'admin.posts.index',
                            'group_id' => 5,
                            'description' => 'Ver listado de posts'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.show',
                            'group_id' => 5,
                            'description' => 'Ver post'])->syncRoles($role1);
        Permission::create(['name' => 'admin.posts.create',
                            'group_id' => 5,
                            'description' => 'Crear post'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.edit',
                            'group_id' => 5,
                            'description' => 'Editar post'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.destroy',
                            'group_id' => 5,
                            'description' => 'Eliminar post'])->syncRoles($role1, $role2);


        /* ACTIVIDADES USUARIO*/
        Permission::create(['name' => 'activities.index',
                            'group_id' => 6,
                            'description' => 'Ver listado de actividades'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'activities.show',
                            'group_id' => 6,
                            'description' => 'Ver actividades'])->syncRoles($role1);
        Permission::create(['name' => 'activities.create',
                            'group_id' => 6,
                            'description' => 'Crear actividad'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'activities.edit',
                            'group_id' => 6,
                            'description' => 'Editar actividad'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'activities.destroy',
                            'group_id' => 6,
                            'description' => 'Eliminar actividad'])->syncRoles($role1, $role2);

        /* ACTIVIDADES ADMIN*/
        Permission::create(['name' => 'admin.activities.index',
                            'group_id' => 7,
                            'description' => 'Ver listado de actividades'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.show',
                            'group_id' => 7,
                            'description' => 'Ver actividades'])->syncRoles($role1);
        Permission::create(['name' => 'admin.activities.create',
                            'group_id' => 7,
                            'description' => 'Crear actividad'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.edit',
                            'group_id' => 7,
                            'description' => 'Editar actividad'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.destroy',
                            'group_id' => 7,
                            'description' => 'Eliminar actividad'])->syncRoles($role1, $role2);


        /* IMPRIMIR PDF */
        Permission::create(['name' => 'activities.pdf.down',
                            'group_id' => 8,
                            'description' => 'Bajar PDF de actividades'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'activities.pdf.show',
                            'group_id' => 8,
                            'description' => 'Mostrar/Bajar PDF de actividades'])->syncRoles($role1,$role2);


        /* FACULTADES */
        Permission::create(['name' => 'admin.faculties.index',
                            'group_id' => 9,
                            'description' => 'Ver listado de facultades'])->syncRoles($role1);
        Permission::create(['name' => 'admin.faculties.show',
                            'group_id' => 9,
                            'description' => 'Ver facultad'])->syncRoles($role1);
        Permission::create(['name' => 'admin.faculties.create',
                            'group_id' => 9,
                            'description' => 'Crear facultad'])->syncRoles($role1);
        Permission::create(['name' => 'admin.faculties.edit',
                            'group_id' => 9,
                            'description' => 'Editar facultad'])->syncRoles($role1);
        Permission::create(['name' => 'admin.faculties.destroy',
                            'group_id' => 9,
                            'description' => 'Eliminar facultad'])->syncRoles($role1);


        /* MATERIAS */
        Permission::create(['name' => 'admin.courses.index',
                            'group_id' => 10,
                            'description' => 'Ver listado de materias'])->syncRoles($role1);
        Permission::create(['name' => 'admin.courses.show',
                            'group_id' => 10,
                            'description' => 'Ver materia'])->syncRoles($role1);
        Permission::create(['name' => 'admin.courses.create',
                            'group_id' => 10,
                            'description' => 'Crear materia'])->syncRoles($role1);
        Permission::create(['name' => 'admin.courses.edit',
                            'group_id' => 10,
                            'description' => 'Editar materia'])->syncRoles($role1);
        Permission::create(['name' => 'admin.courses.destroy',
                            'group_id' => 10,
                            'description' => 'Eliminar materia'])->syncRoles($role1);

        /* ROLES */
        Permission::create(['name' => 'admin.roles.index',
                            'group_id' => 11,
                            'description' => 'Ver listado de roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.show',
                            'group_id' => 11,
                            'description' => 'Ver rol'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.create',
                            'group_id' => 11,
                            'description' => 'Crear roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.edit',
                            'group_id' => 11,
                            'description' => 'Editar roles'])->syncRoles($role1);
        Permission::create(['name' => 'admin.roles.destroy',
                            'group_id' => 11,
                            'description' => 'Eliminar roles'])->syncRoles($role1);


        /* PERIODOS */
        Permission::create(['name' => 'admin.periods.index',
                            'group_id' => 12,
                            'description' => 'Ver listado de periodos'])->syncRoles($role1);
        Permission::create(['name' => 'admin.periods.show',
                            'group_id' => 12,
                            'description' => 'Ver periodo'])->syncRoles($role1);
        Permission::create(['name' => 'admin.periods.create',
                            'group_id' => 12,
                            'description' => 'Crear periodos'])->syncRoles($role1);
        Permission::create(['name' => 'admin.periods.edit',
                            'group_id' => 12,
                            'description' => 'Editar periodos'])->syncRoles($role1);
        Permission::create(['name' => 'admin.periods.destroy',
                            'group_id' => 12,
                            'description' => 'Eliminar periodos'])->syncRoles($role1);


         /* IMPORTAR PROFESORES */
        Permission::create(['name' => 'admin.users.import',
                            'group_id' => 13,
                            'description' => 'Importar listado de Profesores'])->syncRoles($role1);

    }
}
