<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'admin']);
        $permissions = [

            'create-employee',
            'view-employees',
            'update-employee',
            'delete-employee',

            'create-meeting',
            'view-meetings',
            'update-meeting',
            'delete-meeting',

            

        ];

        foreach ($permissions as $permission) {
            // Create permission only if it doesn't exist
            if (!Permission::where('name', $permission)->exists()) {
                $newPermission = Permission::create(['name' => $permission]);
                $role->givePermissionTo($newPermission);
            }
        }
        
    }
}
