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
        $productsFile = 'storage/app/products.csv';
        $imagesFile = 'storage/app/images.csv';

        // Check if products file exists
        if (!file_exists($productsFile)) {
            dd("Products file not found: $productsFile");
        }

        // Check if images file exists
        if (!file_exists($imagesFile)) {
            dd("Images file not found: $imagesFile");
        }

        // Read products CSV
        $products = $this->readCSV($productsFile);

        foreach ($products as $productData) {
            // Insert product into 'products' table
            $productId = DB::table('products')->insertGetId([
                'product_name' => $productData['product_name'],
                'slug' => Str::slug($productData['product_name']),
                'price' => $productData['price'],
                'quantity' => $productData['quantity'],
                'description' => $productData['description'],
                'specifications' => $productData['specifications'],
                'product_code' => $productData['product_code'],
                'color' => $productData['color'],
                'sale' => (int) $productData['sale'],
                'featured' => (int) $productData['featured'],
                'status' => (int) $productData['status'],
                'stock' => (int) $productData['stock'],
                'category_id' => (int) $productData['category_id'],
                'brand_id' => (int) $productData['brand_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Find corresponding images for this product from images CSV
            $images = $this->findImagesForProduct($imagesFile, $productData['product_code']);

            // Insert images into 'product_images' table
            if (!empty($images)) {
                DB::table('product_images')->insert($images);
            }
        }
    }

    /**
     * Read CSV file and return data as array.
     *
     * @param string $filePath
     * @return array
     */
    private function readCSV($filePath)
    {
        $file = new \SplFileObject($filePath, 'r');
        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);

        $header = null;
        $data = [];

        foreach ($file as $row) {
            if (!is_array($row)) {
                continue;
            }

            if (!$header) {
                $header = array_map('trim', $row);
            } else {
                $data[] = array_combine($header, array_map('trim', $row));
            }
        }

        return $data;
    }

    /**
     * Find images for a product based on product code.
     *
     * @param string $imagesFile
     * @param string $productCode
     * @return array
     */
    private function findImagesForProduct($imagesFile, $productCode)
    {
        $images = [];
        $file = new \SplFileObject($imagesFile, 'r');
        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);

        $header = null;

        foreach ($file as $row) {
            if (!is_array($row)) {
                continue;
            }

            if (!$header) {
                $header = array_map('trim', $row);
            } else {
                $rowData = array_combine($header, array_map('trim', $row));
                if ($rowData['product_code'] === $productCode) {
                    $images[] = [
                        'product_id' => $productId, // Assuming you have product_id available
                        'image_url' => $rowData['image_url'], // Adjust this based on your CSV structure
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        return $images;
    }
}
