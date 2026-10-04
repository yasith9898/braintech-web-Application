<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Custom web application development using modern frameworks and technologies. We build responsive, scalable, and secure web solutions tailored to your business needs.',
                'icon' => 'fa-code',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'description' => 'Native and cross-platform mobile application development for iOS and Android. We create intuitive and high-performance mobile experiences.',
                'icon' => 'fa-mobile-alt',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Cloud Solutions',
                'slug' => 'cloud-solutions',
                'description' => 'Cloud infrastructure design, migration, and management. We help you leverage AWS, Azure, and Google Cloud for optimal performance and cost-efficiency.',
                'icon' => 'fa-cloud',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'title' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'description' => 'User-centered design solutions that create engaging and intuitive digital experiences. Our design team focuses on usability and aesthetics.',
                'icon' => 'fa-paint-brush',
                'is_featured' => false,
                'order' => 4,
            ],
            [
                'title' => 'DevOps & Automation',
                'slug' => 'devops-automation',
                'description' => 'Streamline your development and deployment processes with our DevOps expertise. We implement CI/CD pipelines and infrastructure automation.',
                'icon' => 'fa-cogs',
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'title' => 'Cybersecurity',
                'slug' => 'cybersecurity',
                'description' => 'Comprehensive security solutions to protect your digital assets. We offer security audits, penetration testing, and security implementation.',
                'icon' => 'fa-shield-alt',
                'is_featured' => false,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
