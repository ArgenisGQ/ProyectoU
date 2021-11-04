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

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.create',
                            'description' => 'Crear usuario *REVISAR'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->syncRoles($role1);


        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'Ver listado de categorias'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Crear Categorias'])->syncRoles($role1);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Editar categorias'])->syncRoles($role1);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Eliminar categorias'])->syncRoles($role1);

        Permission::create(['name' => 'admin.tags.index',
                            'description' => 'Ver listado de etiquetas'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.tags.create',
                            'description' => 'Crear etiquetas'])->syncRoles($role1);
        Permission::create(['name' => 'admin.tags.edit',
                            'description' => 'Editar etiquetas'])->syncRoles($role1);
        Permission::create(['name' => 'admin.tags.destroy',
                            'description' => 'Eliminar etiquetas'])->syncRoles($role1);

        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'Ver listado de posts'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Crear posts'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Editar posts'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Eliminar posts'])->syncRoles($role1, $role2);

        Permission::create(['name' => 'admin.activities.index',
                            'description' => 'Ver listado de actividades'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.create',
                            'description' => 'Crear actividades'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.edit',
                            'description' => 'Editar actividades'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.activities.destroy',
                            'description' => 'Eliminar actividades'])->syncRoles($role1, $role2);
    }
}
