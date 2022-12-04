<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        Permission::create(['name' => 'do anything']);
        Permission::create(['name' => 'administer website']);

        // Create roles and assign created permissions
        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                // TODO: Add other permissions
                'administer website'
            ]);

        Role::create(['name' => 'user'])
            ->givePermissionTo([
                // TODO: Add other permissions
            ]);

        // Assign roles to demo users
        $user = User::where('email', 'super@saule.mx')->first();
        $user->assignRole('super-admin');

        $user = User::where('email', 'admin@saule.mx')->first();
        $user->assignRole('admin');

        $user = User::where('email', 'test@test.com')->first();
        $user->assignRole('user');
    }
}
