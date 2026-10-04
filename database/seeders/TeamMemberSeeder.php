<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'John Smith',
                'slug' => 'john-smith',
                'position' => 'CEO & Founder',
                'bio' => 'Visionary leader with 15+ years of experience in technology and business development. Passionate about building innovative solutions.',
                'email' => 'john@example.com',
                'linkedin' => 'https://linkedin.com/in/johnsmith',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Sarah Johnson',
                'slug' => 'sarah-johnson',
                'position' => 'CTO',
                'bio' => 'Technology expert with deep expertise in cloud architecture and software engineering. Leading our technical vision and innovation.',
                'email' => 'sarah@example.com',
                'linkedin' => 'https://linkedin.com/in/sarahjohnson',
                'github' => 'https://github.com/sarahjohnson',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Michael Chen',
                'slug' => 'michael-chen',
                'position' => 'Lead Developer',
                'bio' => 'Full-stack developer specializing in Laravel and React. Expert in building scalable web applications.',
                'email' => 'michael@example.com',
                'linkedin' => 'https://linkedin.com/in/michaelchen',
                'github' => 'https://github.com/michaelchen',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Emily Davis',
                'slug' => 'emily-davis',
                'position' => 'UI/UX Designer',
                'bio' => 'Creative designer with a passion for creating intuitive and beautiful user experiences.',
                'email' => 'emily@example.com',
                'linkedin' => 'https://linkedin.com/in/emilydavis',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'David Wilson',
                'slug' => 'david-wilson',
                'position' => 'DevOps Engineer',
                'bio' => 'Infrastructure and automation specialist ensuring smooth deployments and system reliability.',
                'email' => 'david@example.com',
                'linkedin' => 'https://linkedin.com/in/davidwilson',
                'github' => 'https://github.com/davidwilson',
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($members as $member) {
            \App\Models\TeamMember::create($member);
        }
    }
}
