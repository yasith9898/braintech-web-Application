<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'BrainTech Solutions', 'type' => 'text', 'group' => 'general'],
            ['key' => 'company_description', 'value' => 'Leading IT solutions provider specializing in web development, mobile apps, and cloud services.', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'company_email', 'value' => 'info@braintech.com', 'type' => 'email', 'group' => 'contact'],
            ['key' => 'company_phone', 'value' => '+1 (555) 123-4567', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'company_address', 'value' => '123 Tech Street, Silicon Valley, CA 94025', 'type' => 'textarea', 'group' => 'contact'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/braintech', 'type' => 'url', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/braintech', 'type' => 'url', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/braintech', 'type' => 'url', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/braintech', 'type' => 'url', 'group' => 'social'],
            ['key' => 'github_url', 'value' => 'https://github.com/braintech', 'type' => 'url', 'group' => 'social'],
            ['key' => 'google_map_url', 'value' => 'https://maps.google.com/?q=123+Tech+Street', 'type' => 'url', 'group' => 'contact'],
            ['key' => 'footer_copyright', 'value' => '© 2024 BrainTech Solutions. All rights reserved.', 'type' => 'text', 'group' => 'footer'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}
