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

        // create permissions
        // Permission::create(['name' => 'manage courses']);
        // Permission::create(['name' => 'manage enrollments']);
        // Permission::create(['name' => 'manage payments']);
        // Permission::create(['name' => 'manage communications']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'tutor']);

        $role2 = Role::create(['name' => 'admin']);

        $user = User::factory()->create([
            'name' => 'Tutor Example',
            'email' => 'tutor@example.com',
        ]);
        $user->tutor()->create([
            'phone' => '000-000-0000',
        ]);
        $user->tutor->students()->create([
            'tutor_id' => $user->id,
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'birthdate' => '2000-08-05',
        ]);
        $user->assignRole($role1);

        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
        ]);
        $admin->assignRole($role2);
    }
}
