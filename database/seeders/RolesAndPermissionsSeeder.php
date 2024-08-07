<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Créer des permissions
        $permissions = [
            'create product',
            'edit product',
            'delete product',
            'create invoice',
            'edit invoice',
            'delete invoice',
            'create service',
            'edit service',
            'delete service',
            'create devis',
            'read devis',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Créer des rôles
        $roles = [
            'admin',
            'user',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Assigner des permissions aux rôles
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo([
            'create product',
            'edit product',
            'delete product',
            'create invoice',
            'edit invoice',
            'delete invoice',
            'create service',
            'edit service',
            'delete service',
            'read devis'
        ]);

        $userRole = Role::findByName('user');
        $userRole->givePermissionTo(['create invoice','edit invoice','delete invoice','create devis', 'edit service']);
    }
}
