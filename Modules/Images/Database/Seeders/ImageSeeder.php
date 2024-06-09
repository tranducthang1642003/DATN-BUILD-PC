<?php

namespace Modules\Images\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            ['url_image' => 'image1.jpg', 'category_id' => 1,],
            ['url_image' => 'image2.jpg', 'category_id' => 2, ],
            ['url_image' => 'image3.jpg', 'category_id' => 3,],
            ['url_image' => 'image4.jpg', 'category_id' => 4,],
            ['url_image' => 'image5.jpg', 'category_id' => 5,],
        ];

        DB::table('images')->insert($images);
    }
}
