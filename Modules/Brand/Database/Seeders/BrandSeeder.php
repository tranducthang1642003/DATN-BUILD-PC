<?php

namespace Modules\Brand\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $brands = [
            ['name' => 'ASUS', 'description' => 'ASUS Description', 'slug' => Str::slug('ASUS')],
            ['name' => 'MSI', 'description' => 'MSI Description', 'slug' => Str::slug('MSI')],
            ['name' => 'Gigabyte', 'description' => 'Gigabyte Description', 'slug' => Str::slug('Gigabyte')],
            ['name' => 'ASRock', 'description' => 'ASRock Description', 'slug' => Str::slug('ASRock')],
            ['name' => 'EVGA', 'description' => 'EVGA Description', 'slug' => Str::slug('EVGA')],
            ['name' => 'Zotac', 'description' => 'Zotac Description', 'slug' => Str::slug('Zotac')],
            ['name' => 'Sapphire', 'description' => 'Sapphire Description', 'slug' => Str::slug('Sapphire')],
            ['name' => 'Palit', 'description' => 'Palit Description', 'slug' => Str::slug('Palit')],
            ['name' => 'Biostar', 'description' => 'Biostar Description', 'slug' => Str::slug('Biostar')],
            ['name' => 'Colorful', 'description' => 'Colorful Description', 'slug' => Str::slug('Colorful')],
            ['name' => 'Corsair', 'description' => 'Corsair Description', 'slug' => Str::slug('Corsair')],
            ['name' => 'Kingston', 'description' => 'Kingston Description', 'slug' => Str::slug('Kingston')],
            ['name' => 'Crucial', 'description' => 'Crucial Description', 'slug' => Str::slug('Crucial')],
            ['name' => 'G.Skill', 'description' => 'G.Skill Description', 'slug' => Str::slug('G.Skill')],
            ['name' => 'ADATA', 'description' => 'ADATA Description', 'slug' => Str::slug('ADATA')],
            ['name' => 'Western Digital', 'description' => 'Western Digital Description', 'slug' => Str::slug('Western Digital')],
            ['name' => 'Seagate', 'description' => 'Seagate Description', 'slug' => Str::slug('Seagate')],
            ['name' => 'Samsung', 'description' => 'Samsung Description', 'slug' => Str::slug('Samsung')],
            ['name' => 'Intel', 'description' => 'Intel Description', 'slug' => Str::slug('Intel')],
            ['name' => 'AMD', 'description' => 'AMD Description', 'slug' => Str::slug('AMD')],
            ['name' => 'Cooler Master', 'description' => 'Cooler Master Description', 'slug' => Str::slug('Cooler Master')],
            ['name' => 'NZXT', 'description' => 'NZXT Description', 'slug' => Str::slug('NZXT')],
            ['name' => 'Fractal Design', 'description' => 'Fractal Design Description', 'slug' => Str::slug('Fractal Design')],
            ['name' => 'Thermaltake', 'description' => 'Thermaltake Description', 'slug' => Str::slug('Thermaltake')],
            ['name' => 'Deepcool', 'description' => 'Deepcool Description', 'slug' => Str::slug('Deepcool')],
        ];

        // Insert each brand into the database
        foreach ($brands as $brand) {
            DB::table('brands')->insert($brand);
        }
    }
    }

