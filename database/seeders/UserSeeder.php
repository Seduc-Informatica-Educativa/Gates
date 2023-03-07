<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '4VxIPEix5qIhxggguO4oSezvnX3t5UXtgUmfgEesf7kwAANKdItaeIsBgx62',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-12-24 12:08:40',
                'updated_at' => '2021-12-24 12:09:34',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User',
                'email' => 'user@user.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CYDf53IaWuqWcjeSNfKxWOd7fy/flhk/ABjBzkIBGaPZCIjrqyU.a',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-12-24 12:08:40',
                'updated_at' => '2021-12-24 12:09:34',
                'deleted_at' => NULL,
            ),
        ));    
    }
}
