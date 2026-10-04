<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-featured e-commerce platform with payment integration, inventory management, and analytics dashboard.',
                'content' => 'Built a comprehensive e-commerce solution featuring real-time inventory tracking, multiple payment gateways, and advanced analytics. The platform handles thousands of daily transactions with 99.9% uptime.',
                'client' => 'RetailCorp Inc.',
                'completed_date' => '2024-03-15',
                'project_url' => 'https://example.com',
                'is_featured' => true,
                'category' => 'E-Commerce',
                'order' => 1,
            ],
            [
                'title' => 'Healthcare Management System',
                'slug' => 'healthcare-management-system',
                'description' => 'HIPAA-compliant healthcare management system for hospitals and clinics.',
                'content' => 'Developed a secure healthcare management system that streamlines patient records, appointment scheduling, and billing processes while maintaining strict HIPAA compliance.',
                'client' => 'MedCare Solutions',
                'completed_date' => '2024-02-20',
                'is_featured' => true,
                'category' => 'Healthcare',
                'order' => 2,
            ],
            [
                'title' => 'FinTech Dashboard',
                'slug' => 'fintech-dashboard',
                'description' => 'Real-time financial analytics dashboard for investment firms.',
                'content' => 'Created a sophisticated financial analytics platform with real-time data visualization, portfolio tracking, and automated reporting features for investment professionals.',
                'client' => 'InvestPro LLC',
                'completed_date' => '2024-01-10',
                'is_featured' => true,
                'category' => 'FinTech',
                'order' => 3,
            ],
            [
                'title' => 'Social Media App',
                'slug' => 'social-media-app',
                'description' => 'Cross-platform social media application with real-time messaging.',
                'content' => 'Built a modern social media application with features including real-time messaging, content sharing, and social networking capabilities across iOS and Android platforms.',
                'client' => 'ConnectSocial',
                'completed_date' => '2023-12-05',
                'is_featured' => false,
                'category' => 'Mobile',
                'order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            \App\Models\Project::create($project);
        }
    }
}
