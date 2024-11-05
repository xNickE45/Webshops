<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consoles = [
            [
                'name' => 'PlayStation 5',
                'image_url' => 'https://gmedia.playstation.com/is/image/SIEPDC/ps5-product-thumbnail-01-en-14sep21?$facebook$',
                'price' => 499.99,
                'amount' => 10,
            ],
            [
                'name' => 'Xbox Series X',
                'image_url' => 'https://cms-assets.xboxservices.com/assets/bc/40/bc40fdf3-85a6-4c36-af92-dca2d36fc7e5.png?n=642227_Hero-Gallery-0_A1_857x676.png',
                'price' => 499.99,
                'amount' => 10,
            ],
            [
                'name' => 'Nintendo Switch',
                'image_url' => 'https://www.nintendo.com/eu/media/images/08_content_images/systems_5/nintendo_switch_3/not_approved_1/NSwitchTop.png',
                'price' => 299.99,
                'amount' => 10,
            ],
            [
                'name' => 'Wii',
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Wii_console.png/600px-Wii_console.png',
                'price' => 199.99,
                'amount' => 10,
            ]
        ];

        foreach ($consoles as $console) {
            \App\Models\Console::create($console);
        }
    }
}
