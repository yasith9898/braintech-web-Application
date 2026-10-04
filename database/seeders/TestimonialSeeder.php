<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Robert Thompson',
                'company' => 'TechStart Inc.',
                'position' => 'CEO',
                'content' => 'Exceptional work! The team delivered our project on time and exceeded our expectations. Their technical expertise and professionalism are outstanding.',
                'rating' => 5,
                'is_published' => true,
                'order' => 1,
            ],
            [
                'name' => 'Jennifer Martinez',
                'company' => 'Global Retail',
                'position' => 'CTO',
                'content' => 'Working with this team was a great experience. They understood our requirements perfectly and delivered a robust solution that scales with our business.',
                'rating' => 5,
                'is_published' => true,
                'order' => 2,
            ],
            [
                'name' => 'James Anderson',
                'company' => 'FinanceHub',
                'position' => 'Director of Technology',
                'content' => 'The quality of their work is impressive. They built a secure and efficient platform that has transformed our operations. Highly recommended!',
                'rating' => 5,
                'is_published' => true,
                'order' => 3,
            ],
            [
                'name' => 'Lisa Brown',
                'company' => 'HealthFirst',
                'position' => 'IT Manager',
                'content' => 'Professional, responsive, and technically skilled. They delivered a healthcare solution that meets all regulatory requirements while being user-friendly.',
                'rating' => 5,
                'is_published' => true,
                'order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            \App\Models\Testimonial::create($testimonial);
        }
    }
}
