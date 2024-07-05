<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsFile = storage_path('app/products.csv');
        $imagesFile = storage_path('app/image.csv');

        if (!file_exists($productsFile)) {
            dd("File not found: $productsFile");
        }

        if (!file_exists($imagesFile)) {
            dd("File not found: $imagesFile");
        }

        $productsData = $this->readCsv($productsFile);
        $imagesData = $this->readCsv($imagesFile);

        foreach ($productsData as $product) {
            // Insert product into 'products' table
            $productId = DB::table('products')->insertGetId([
                'product_name' => $product['product_name'],
                'slug' => Str::slug($product['product_name']),
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'description' => $product['description'],
                'specifications' => $product['specifications'],
                'product_code' => $product['product_code'],
                'color' => $product['color'],
                'sale' => (int) $product['sale'],
                'featured' => (int) $product['featured'],
                'status' => (int) $product['status'],
                'stock' => (int) $product['stock'],
                'category_id' => (int) $product['category_id'],
                'brand_id' => (int) $product['brand_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Find images for current product_id from imagesData
            $productImages = array_filter($imagesData, function ($image) use ($productId) {
                return $image['product_id'] == $productId;
            });

            $images = [];
            $imageCount = 0;
            foreach ($productImages as $key => $image) {
                $images[] = [
                    'product_id' => $productId,
                    'image_path' => $image['image_path'],
                    'is_primary' => $imageCount === 0 ? 1 : 0, // First image is primary, others are secondary
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert product images into 'product_images' table
            DB::table('product_images')->insert($images);
        }
    }

    /**
     * Read CSV file and return data as associative array.
     *
     * @param string $filePath
     * @return array
     */
    private function readCsv($filePath)
    {
        $data = [];

        $file = new \SplFileObject($filePath, 'r');
        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);

        $header = null;
        foreach ($file as $row) {
            if (!$header) {
                $header = array_map('trim', $row);
            } else {
                $data[] = array_combine($header, array_map('trim', $row));
            }
        }

        return $data;
    }
}
