<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Group::factory()->create([
            'name' => 'Group 1',
            'description' => 'Group 1'
        ]);

        \App\Models\Group::factory()->create([
            'name' => 'Group 2',
            'description' => 'Group 2'
        ]);

        \App\Models\Group::factory()->create([
            'name' => 'Group 3',
            'description' => 'Group 3'
        ]);
    }
}
