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
    public function run()
    {
        Product::create([
            'name' => 'Timeless Elegance',
            'small_description' => 'A Classic Companion for Every Occasion.',
            'large_description' => 'This watch blends elegance with precision...',
            'price' => 2500.00,
            'quantity' => 10,
            'image' => 'products/item1Home.jpg'
        ]);

        Product::create([
            'name' => 'Luxe Horizon',
            'small_description' => 'Radiate Glamour with Every Tick.',
            'large_description' => 'Luxe Horizon offers a seamless blend of...',
            'price' => 3200.00,
            'quantity' => 5,
            'image' => 'products/item2Home.jpg'
        ]);
    }
}
