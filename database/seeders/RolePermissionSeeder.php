<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    // Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];

        $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admins']);

     
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup, 'guard_name' => 'admins']);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }

        $admin = Admin::where('username', 'superadmin')->first();
        if ($admin) {
            $admin->assignRole($roleSuperAdmin);
        }
    }
}
