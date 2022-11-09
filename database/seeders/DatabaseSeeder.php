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
        $firstUser = User::firstOrCreate([
            'email' => 'first@example.com',
        ],[
            'name' => 'First',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'ABCDEFGHIK',
        ]);
        $secondUser = User::firstOrCreate([
            'email' => 'second@example.com',
        ],[
            'name' => 'Second',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'ABCDEFGHIK',
        ]);

        $adminRole = Role::firstOrCreate([
            'name' => 'Admin',
        ]);
        $moderatorRole = Role::firstOrCreate([
            'name' => 'Moderator',
        ]);

        RoleUser::firstOrCreate([
            'role_id' => $adminRole->id,
            'user_id' => $firstUser->id,
            'comment' => 'Give role Admin to user First',
        ]);
        RoleUser::firstOrCreate([
            'role_id' => $moderatorRole->id,
            'user_id' => $secondUser->id,
            'comment' => 'Give role Moderator to user Second',
        ]);
    }
}
