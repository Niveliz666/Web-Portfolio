<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-featured online shopping platform with cart, checkout, and payment integration.',
                'long_description' => 'Built a complete e-commerce solution with user authentication, product management, shopping cart, secure checkout process, and order tracking. Integrated with Stripe for payments.',
                'category' => 'Web Application',
                'technologies' => ['Laravel', 'React', 'MySQL', 'Stripe', 'Tailwind CSS'],
                'featured' => true,
                'sort_order' => 1,
                'live_url' => 'https://example.com/ecommerce',
            ],
            [
                'title' => 'Task Management App',
                'slug' => 'task-management-app',
                'description' => 'A collaborative project management tool with real-time updates and team features.',
                'long_description' => 'Developed a comprehensive task management application with kanban boards, team collaboration, file attachments, comments, and real-time notifications.',
                'category' => 'Web Application',
                'technologies' => ['Vue.js', 'Node.js', 'MongoDB', 'Socket.io'],
                'featured' => true,
                'sort_order' => 2,
                'live_url' => 'https://example.com/taskapp',
            ],
            [
                'title' => 'Portfolio Website',
                'slug' => 'portfolio-website',
                'description' => 'A modern, responsive portfolio website with smooth animations and dark theme.',
                'long_description' => 'Created a visually stunning portfolio with custom animations, smooth scrolling, responsive design, and contact form integration.',
                'category' => 'Website',
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'GSAP'],
                'featured' => false,
                'sort_order' => 3,
                'live_url' => 'https://example.com/portfolio',
            ],
            [
                'title' => 'Restaurant Booking System',
                'slug' => 'restaurant-booking',
                'description' => 'Online reservation system for restaurants with table management and notifications.',
                'long_description' => 'Built a complete booking solution with table availability calendar, reservation management, email confirmations, and admin dashboard.',
                'category' => 'Web Application',
                'technologies' => ['PHP', 'Laravel', 'MySQL', 'Bootstrap'],
                'featured' => false,
                'sort_order' => 4,
                'live_url' => 'https://example.com/restaurant',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}