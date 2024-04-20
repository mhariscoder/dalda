<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'student-apply-scholarship-list',
            'student-apply-scholarship-create',
            'student-claim-scholarship-list',
            'student-claim-scholarship-create',
            'student-notification-list'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'student']);

        $role->syncPermissions($permissions);
    }
}
