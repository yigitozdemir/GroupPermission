<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Permission::factory()->create([
            'group_id' => 1,
            'permission' => 0
        ]);

        \App\Models\Permission::factory()->create([
            'group_id' => 2,
            'permission' => 1
        ]);

        \App\Models\Permission::factory()->create([
            'group_id' => 3,
            'permission' => 2
        ]);
    }
}
