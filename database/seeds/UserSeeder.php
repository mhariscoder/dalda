<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-update',
            'user-delete',
            'role-list',
            'role-create',
            'role-update',
            'role-delete',
            'apply-scholarship-list',
            'apply-scholarship-create',
            'apply-scholarship-update',
            'apply-scholarship-change-status',
            'claim-scholarship-list',
            'claim-scholarship-create',
            'claim-scholarship-update',
            'claim-scholarship-change-status',
            'upload-documents',
            'add-documents',
            'delete-documents',
            'notification-list',
            'web-content-management'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'super-admin']);

        $role->syncPermissions($permissions);

        $user = \App\Models\User::create([
            'first_name' => 'Faizan Ahmed',
            'last_name' => 'Raza',
            'email' => 'admin@viftech.com.pk',
            'password' => 'admin123',
            'is_verified' => 1,
        ]);

        $user->assignRole($role);
    }
}
