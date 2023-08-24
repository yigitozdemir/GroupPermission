<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Membership::factory()->create([
            'user_id' => 1,
            'group_id' => 1
        ]);

        \App\Models\Membership::factory()->create([
            'user_id' => 2,
            'group_id' => 2
        ]);

        \App\Models\Membership::factory()->create([
            'user_id' => 3,
            'group_id' => 3
        ]);
    }
}
