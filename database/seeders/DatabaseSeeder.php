<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'user@example.com',
        ],[
            'name' => 'User',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'ABCDEFGHIK',
        ]);

        $role = Role::firstOrCreate([
            'name' => 'Admin',
        ]);

        RoleUser::firstOrCreate([
            'role_id' => $role->id,
            'user_id' => $user->id,
            'comment' => 'Give role Admin to user User',
        ]);
    }
}
