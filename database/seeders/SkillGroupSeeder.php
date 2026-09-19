<?php

namespace Database\Seeders;

use App\Models\SkillGroup;
use Illuminate\Database\Seeder;

class SkillGroupSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['key' => 'design', 'title' => 'Design Skill', 'sort_order' => 0],
            ['key' => 'development', 'title' => 'Development Skill', 'sort_order' => 1],
        ] as $group) {
            SkillGroup::query()->updateOrCreate(
                ['key' => $group['key']],
                $group + ['is_active' => true],
            );
        }
    }
}
