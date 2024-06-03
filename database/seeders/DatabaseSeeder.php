<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'password' => Hash::make('111'),
        //     'email' => 'user@email.com',
        // ]);

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'admin@mail.com',
            // 'username' => 'admin',
            'password' => Hash::make('11111111')
        ]);
        $admin->assignRole('Admin');
    }
}
