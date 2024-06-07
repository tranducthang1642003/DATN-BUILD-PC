<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Xóa dữ liệu cũ trong bảng categories
        DB::table('categories')->delete();

        // Dữ liệu mẫu cho danh mục
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Electronic gadgets and devices.',
                'image_id' => 27, // ID của hình ảnh trong bảng images
            ],
            [
                'name' => 'Books',
                'slug' => 'books',
                'description' => 'Wide range of books from various genres.',
                'image_id' => 26, // ID của hình ảnh trong bảng images
            ],
            [
                'name' => 'Clothing',
                'slug' => 'clothing',
                'description' => 'Fashionable and comfortable clothing.',
                'image_id' => 25, // ID của hình ảnh trong bảng images
            ],
        ];

        // Thêm dữ liệu vào bảng categories
        DB::table('categories')->insert($categories);
    }
}
