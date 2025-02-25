<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'name' => 'khaled',
            'email' => 'khaled@super-admin.com',
            'phone' => '055281415',
            'password' => Hash::make('123456')
        ]);

        $role = Role::create(['name' => 'Admin', 'guard_name' => 'admins']);

        $permissions = Permission::where('guard_name', 'admins')->pluck('id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole($role->name);

    }
}
