<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Gaming Laptop Pro',
                'slug' => 'gaming-laptop-pro',
                'description' => 'High-performance gaming laptop with latest Intel processor and NVIDIA graphics card. Perfect for gaming and content creation.',
                'specifications' => 'Intel Core i9-13900HX, NVIDIA RTX 4080, 32GB DDR5 RAM, 1TB NVMe SSD, 17.3" 240Hz Display',
                'sku' => 'GLP-2024-001',
                'brand' => 'TechBrand',
                'model' => 'XG-9000',
                'price' => 2499.99,
                'currency' => 'USD',
                'category' => 'Laptops',
                'in_stock' => true,
                'stock_quantity' => 15,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
                'warranty' => '2 Years International Warranty',
                'weight' => '2.5 kg',
                'dimensions' => '39.5 x 26 x 2.5 cm',
            ],
            [
                'name' => 'Wireless Mechanical Keyboard',
                'slug' => 'wireless-mechanical-keyboard',
                'description' => 'Premium wireless mechanical keyboard with RGB lighting and hot-swappable switches. Long battery life and multi-device connectivity.',
                'specifications' => 'Cherry MX Red Switches, RGB Backlight, Bluetooth 5.0, USB-C Charging, 4000mAh Battery',
                'sku' => 'WMK-2024-002',
                'brand' => 'KeyMaster',
                'model' => 'KM-Pro',
                'price' => 149.99,
                'currency' => 'USD',
                'category' => 'Accessories',
                'in_stock' => true,
                'stock_quantity' => 50,
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
                'warranty' => '1 Year Warranty',
                'weight' => '0.8 kg',
                'dimensions' => '44 x 13 x 4 cm',
            ],
            [
                'name' => '4K Ultra HD Monitor',
                'slug' => '4k-ultra-hd-monitor',
                'description' => 'Professional-grade 4K monitor with HDR support and color accuracy for designers and content creators.',
                'specifications' => '27" IPS Panel, 3840x2160 Resolution, HDR10, 99% sRGB, 60Hz Refresh Rate, USB-C Hub',
                'sku' => '4KM-2024-003',
                'brand' => 'ViewTech',
                'model' => 'VT-4K-Pro',
                'price' => 599.99,
                'currency' => 'USD',
                'category' => 'Monitors',
                'in_stock' => true,
                'stock_quantity' => 25,
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
                'warranty' => '3 Years Warranty',
                'weight' => '6.5 kg',
                'dimensions' => '61 x 36 x 20 cm',
            ],
            [
                'name' => 'Gaming Mouse Wireless',
                'slug' => 'gaming-mouse-wireless',
                'description' => 'Ergonomic wireless gaming mouse with customizable DPI settings and programmable buttons.',
                'specifications' => '16000 DPI Sensor, 8 Programmable Buttons, RGB Lighting, 70h Battery Life, 2.4GHz + Bluetooth',
                'sku' => 'GMW-2024-004',
                'brand' => 'MousePro',
                'model' => 'MP-X1',
                'price' => 79.99,
                'currency' => 'USD',
                'category' => 'Accessories',
                'in_stock' => true,
                'stock_quantity' => 100,
                'is_featured' => false,
                'is_active' => true,
                'order' => 4,
                'warranty' => '1 Year Warranty',
                'weight' => '0.1 kg',
                'dimensions' => '12 x 7 x 4 cm',
            ],
            [
                'name' => 'USB-C Hub Pro',
                'slug' => 'usb-c-hub-pro',
                'description' => 'Multi-port USB-C hub with HDMI, USB 3.0, SD card reader, and power delivery support.',
                'specifications' => '7-in-1 Design, HDMI 4K@60Hz, 3x USB 3.0, SD/MicroSD Card Reader, 100W Power Delivery',
                'sku' => 'UCH-2024-005',
                'brand' => 'ConnectAll',
                'model' => 'CA-Hub7',
                'price' => 49.99,
                'currency' => 'USD',
                'category' => 'Accessories',
                'in_stock' => true,
                'stock_quantity' => 75,
                'is_featured' => false,
                'is_active' => true,
                'order' => 5,
                'warranty' => '1 Year Warranty',
                'weight' => '0.15 kg',
                'dimensions' => '12 x 4 x 1.5 cm',
            ],
            [
                'name' => 'Noise-Canceling Headphones',
                'slug' => 'noise-canceling-headphones',
                'description' => 'Premium wireless headphones with active noise cancellation and high-fidelity audio.',
                'specifications' => '40mm Drivers, ANC Technology, 30h Battery Life, Bluetooth 5.2, Foldable Design',
                'sku' => 'NCH-2024-006',
                'brand' => 'SoundWave',
                'model' => 'SW-ANC-Pro',
                'price' => 299.99,
                'currency' => 'USD',
                'category' => 'Audio',
                'in_stock' => true,
                'stock_quantity' => 40,
                'is_featured' => true,
                'is_active' => true,
                'order' => 6,
                'warranty' => '2 Years Warranty',
                'weight' => '0.25 kg',
                'dimensions' => '18 x 15 x 8 cm',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
