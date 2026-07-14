<?php
namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name'=>'HTML',        'icon'=>'🌐','category'=>'frontend','level'=>95,'sort_order'=>1],
            ['name'=>'CSS/Tailwind','icon'=>'🎨','category'=>'frontend','level'=>92,'sort_order'=>2],
            ['name'=>'JavaScript',  'icon'=>'⚡','category'=>'frontend','level'=>88,'sort_order'=>3],
            ['name'=>'Vue.js',      'icon'=>'💚','category'=>'frontend','level'=>80,'sort_order'=>4],
            ['name'=>'PHP',         'icon'=>'🐘','category'=>'backend', 'level'=>92,'sort_order'=>1],
            ['name'=>'Laravel',     'icon'=>'🔴','category'=>'backend', 'level'=>94,'sort_order'=>2],
            ['name'=>'MySQL',       'icon'=>'🗄️','category'=>'backend', 'level'=>87,'sort_order'=>3],
            ['name'=>'Git',         'icon'=>'🔀','category'=>'tools',   'level'=>90,'sort_order'=>1],
            ['name'=>'Docker',      'icon'=>'🐳','category'=>'tools',   'level'=>70,'sort_order'=>2],
            ['name'=>'Figma',       'icon'=>'🎭','category'=>'tools',   'level'=>78,'sort_order'=>3],
        ];
        foreach ($skills as $s) Skill::firstOrCreate(['name'=>$s['name']], $s);

        $projects = [
            [
                'title'=>'E-Commerce Platform',
                'description'=>'Full-featured online store with payment gateway and admin dashboard.',
                'category'=>'web',
                'technologies'=>['Laravel','Vue.js','MySQL','Stripe','Tailwind CSS'],
                'featured'=>true,'sort_order'=>1,
                'live_url'=>'https://example.com',
            ],
            [
                'title'=>'Task Management App',
                'description'=>'Real-time project management tool with kanban boards.',
                'category'=>'app',
                'technologies'=>['Laravel','Livewire','Alpine.js'],
                'featured'=>true,'sort_order'=>2,
                'live_url'=>'https://example.com',
            ],
            [
                'title'=>'Portfolio CMS',
                'description'=>'Custom CMS for creatives with media uploads and SEO.',
                'category'=>'web',
                'technologies'=>['Laravel','FilamentPHP','Tailwind CSS'],
                'featured'=>false,'sort_order'=>3,
                'live_url'=>'https://example.com',
            ],
        ];
        foreach ($projects as $p) {
            $slug = Str::slug($p['title']);
            Project::firstOrCreate(['slug'=>$slug], array_merge($p,['slug'=>$slug]));
        }
    }
}