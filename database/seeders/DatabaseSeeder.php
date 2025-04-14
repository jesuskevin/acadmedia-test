<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign existing permissions
        $tutorRole = Role::create(['name' => 'tutor']);
        $user = User::factory()->create([
            'name' => 'Example Tutor',
            'email' => 'tutor@example.com',
        ]);
        $user->tutor()->create([
            'phone' => '0000000000',
        ]);
        $user->assignRole($tutorRole);

        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
        ]);
        $admin->assignRole($adminRole);
    }
}
