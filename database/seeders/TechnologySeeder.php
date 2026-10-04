<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'A powerful PHP framework for web application development.',
                'category' => 'Backend',
                'order' => 1,
            ],
            [
                'name' => 'React',
                'slug' => 'react',
                'description' => 'A JavaScript library for building user interfaces.',
                'category' => 'Frontend',
                'order' => 2,
            ],
            [
                'name' => 'Vue.js',
                'slug' => 'vuejs',
                'description' => 'A progressive JavaScript framework for building UIs.',
                'category' => 'Frontend',
                'order' => 3,
            ],
            [
                'name' => 'Node.js',
                'slug' => 'nodejs',
                'description' => 'A JavaScript runtime built on Chrome\'s V8 engine.',
                'category' => 'Backend',
                'order' => 4,
            ],
            [
                'name' => 'Python',
                'slug' => 'python',
                'description' => 'A versatile programming language for various applications.',
                'category' => 'Backend',
                'order' => 5,
            ],
            [
                'name' => 'AWS',
                'slug' => 'aws',
                'description' => 'Amazon Web Services cloud computing platform.',
                'category' => 'Cloud',
                'order' => 6,
            ],
            [
                'name' => 'Docker',
                'slug' => 'docker',
                'description' => 'Container platform for application deployment.',
                'category' => 'DevOps',
                'order' => 7,
            ],
            [
                'name' => 'Kubernetes',
                'slug' => 'kubernetes',
                'description' => 'Container orchestration platform for scaling applications.',
                'category' => 'DevOps',
                'order' => 8,
            ],
            [
                'name' => 'PostgreSQL',
                'slug' => 'postgresql',
                'description' => 'Advanced open-source relational database.',
                'category' => 'Database',
                'order' => 9,
            ],
            [
                'name' => 'MongoDB',
                'slug' => 'mongodb',
                'description' => 'NoSQL database for modern applications.',
                'category' => 'Database',
                'order' => 10,
            ],
        ];

        foreach ($technologies as $tech) {
            \App\Models\Technology::create($tech);
        }
    }
}
