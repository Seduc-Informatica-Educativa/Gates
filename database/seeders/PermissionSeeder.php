<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'admin_access',
            ],
            [
                'id'    => 2,
                'title' => 'user_access',
            ],
            [
                'id'    => 3,
                'title' => 'base_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
