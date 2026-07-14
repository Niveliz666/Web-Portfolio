<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'HTML', 'icon' => '📄', 'category' => 'frontend', 'level' => 95, 'sort_order' => 1],
            ['name' => 'CSS', 'icon' => '🎨', 'category' => 'frontend', 'level' => 90, 'sort_order' => 2],
            ['name' => 'JavaScript', 'icon' => '⚡', 'category' => 'frontend', 'level' => 90, 'sort_order' => 3],
            ['name' => 'React', 'icon' => '⚛️', 'category' => 'frontend', 'level' => 85, 'sort_order' => 4],
            ['name' => 'Vue.js', 'icon' => '💚', 'category' => 'frontend', 'level' => 80, 'sort_order' => 5],
            ['name' => 'Laravel', 'icon' => '🪶', 'category' => 'backend', 'level' => 90, 'sort_order' => 6],
            ['name' => 'PHP', 'icon' => '🐘', 'category' => 'backend', 'level' => 88, 'sort_order' => 7],
            ['name' => 'Node.js', 'icon' => '🟢', 'category' => 'backend', 'level' => 82, 'sort_order' => 8],
            ['name' => 'Python', 'icon' => '🐍', 'category' => 'backend', 'level' => 75, 'sort_order' => 9],
            ['name' => 'MySQL', 'icon' => '🗄️', 'category' => 'database', 'level' => 85, 'sort_order' => 10],
            ['name' => 'MongoDB', 'icon' => '🍃', 'category' => 'database', 'level' => 78, 'sort_order' => 11],
            ['name' => 'PostgreSQL', 'icon' => '🐘', 'category' => 'database', 'level' => 75, 'sort_order' => 12],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}