<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'Gestion de roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'Gestion de permisos'])->syncRoles([$role1]);

        Permission::create(['name' => 'Gestion de usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'Gestion de posts'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'Gestion de categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'Gestion de etiquetas'])->syncRoles([$role1]);
    }
}
