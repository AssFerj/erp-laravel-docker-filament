<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // if (DB::table('permissions')->count() == 0) {
        //     Permission::create(['name' => 'access_admin', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'user_create', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'user_read', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'user_update', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'user_delete', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'permission_create', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'permission_read', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'permission_update', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'permission_delete', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'role_create', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'role_read', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'role_update', 'guard_name' => 'web']);
        //     Permission::create(['name' => 'role_delete', 'guard_name' => 'web']);
        // }
        // Criar permissões
        $permissions = [
            'access_admin',
            'create users',
            'edit users',
            'delete users',
            'view users',
            'create companies',
            'edit companies',
            'delete companies',
            'view companies',
            'create clients',
            'edit clients',
            'delete clients',
            'view clients',
            'create products',
            'edit products',
            'delete products',
            'view products',
            'create sales',
            'edit sales',
            'delete sales',
            'view sales',
            'create supplies',
            'edit supplies',
            'delete supplies',
            'view supplies',
            'create stocks',
            'edit stocks',
            'delete stocks',
            'view stocks',
            'create payments',
            'edit payments',
            'delete payments',
            'view payments',
            'view plans',
            'create plans',
            'edit plans',
            'delete plans',
            'restore plans',
            'force delete plans',
            'permission_read',
            'permission_create',
            'permission_update',
            'permission_delete',
            'role_read',
            'role_create',
            'role_update',
            'role_delete',
        ];

        foreach ($permissions as $permission) {
            // Verifica se a permissão já existe
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }

        // Criar roles
        $adminRole = Role::create(['name' => 'admin']);
        $companyRole = Role::create(['name' => 'company']);
        $customerRole = Role::create(['name' => 'customer']);

        // Atribuir permissões a roles
        $adminRole->givePermissionTo(Permission::all()); // Admin tem todas as permissões
        $companyRole->givePermissionTo([
            'access_admin',
            'create users',
            'edit users',
            'delete users',
            'view users',
            'create clients',
            'edit clients',
            'delete clients',
            'view clients',
            'create products',
            'edit products',
            'delete products',
            'view products',
            'create sales',
            'edit sales',
            'delete sales',
            'view sales',
            'create supplies',
            'edit supplies',
            'delete supplies',
            'view supplies',
            'create stocks',
            'edit stocks',
            'delete stocks',
            'view stocks',
            'create payments',
            'edit payments',
            'delete payments',
            'view payments',
        ]); // Company tem permissões específicas
        $customerRole->givePermissionTo([
            'access_admin',
            'view products',
            'view sales',
            'create payments',
        ]); // Customer tem permissões limitadas
    }
}
