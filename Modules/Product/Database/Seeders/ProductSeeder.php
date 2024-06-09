<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Category\App\Models\Category;
use Modules\Brand\App\Models\Brand;

class ProductSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $brands = Brand::all();

        foreach (range(1, 25) as $index) {
            $category = $categories->random();
            $brand = $brands->random();
            $components = [
                'Mainboard',
                'CPU',
                'VGA',
                'RAM',
                'SSD',
                'HDD',
                'Case',
                'PSU',
                'Fan & Tản Nhiệt',
            ];

           
            $productName = 'Build PC with ' . $components[array_rand($components)];

            DB::table('products')->insert([
                'name' => $productName,
                'slug' => Str::slug($productName) . '-' . uniqid(),
                'price' => rand(500, 2000),
                'quantity' => rand(1, 10), 
                'long_description' => 'Long description for ' . $productName,
                'short_description' => 'Short description for ' . $productName,
                'view' => 0,
                'product_code' => 'PC' . str_pad($index, 4, '0', STR_PAD_LEFT), 
                'discount' => rand(0, 20), 
                'color' => 'Color for ' . $productName,
                'sale' => rand(0, 1),
                'featured' => rand(0, 1),
                'status' => true,
                'id_category' => $category->id,
                'id_brand' => $brand->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
