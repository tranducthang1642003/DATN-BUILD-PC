<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category_name' => 'Màn Hình Máy Tính',
                'slug' => Str::slug('Màn Hình Máy Tính'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Thiết bị máy tính dành cho công việc văn phòng và các nhu cầu chuyên sâu khác',
             
            ],
            [
                'category_name' => 'CPU - Bộ Vi Xử Lý',
                'slug' => Str::slug('CPU - Bộ Vi Xử Lý'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Máy tính nhỏ gọn, tiết kiệm không gian phù hợp cho nhu cầu cơ bản',
            ],
            [
                'category_name' => 'CPU - Bộ Vi Xử Lý',
                'slug' => Str::slug('CPU - Bộ Vi Xử Lý'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Thiết bị máy tính được thiết kế và đặc biệt phù hợp cho doanh nhân',
            ],
            [
                'category_name' => 'Ram - Bộ Nhớ Trong - Bo Mạch Chủ',
                'slug' => Str::slug('Ram - Bộ Nhớ Trong - Bo Mạch Chủ'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Máy tính được tối ưu hóa cho công việc đồ họa, thiết kế và làm phim',
            ],
            [
                'category_name' => 'Ram - Bộ Nhớ Trong',
                'slug' => Str::slug('Ram - Bộ Nhớ Trong'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Bo mạch chủ cho việc lắp ráp máy tính',
            ],
            [
                'category_name' => 'Laptop Gaming - Đồ Họa',
                'slug' => Str::slug('Laptop Gaming - Đồ Họa'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Bộ vi xử lý cho máy tính',
            ],
            [
                'category_name' => 'SSD',
                'slug' => Str::slug('SSD'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Card đồ họa cho máy tính',
            ],
            [
                'category_name' => 'RAM',
                'slug' => Str::slug('RAM'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Bộ nhớ truy cập ngẫu nhiên cho máy tính',
            ],
            [
                'category_name' => 'SSD',
                'slug' => Str::slug('SSD'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Ổ cứng thể rắn cho lưu trữ nhanh chóng',
            ],
            [
                'category_name' => 'Case - Vỏ Máy Tính',
                'slug' => Str::slug('Case - Vỏ Máy Tính'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Ổ cứng cơ học cho lưu trữ dữ liệu lớn',
            ],
            [
                'category_name' => 'Thiết bị lưu trữ, USB, thẻ nhớ',
                'slug' => Str::slug('Thiết bị lưu trữ, USB, thẻ nhớ'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Vỏ máy tính để lắp ráp các linh kiện',
            ],
            [
                'category_name' => 'PSU',
                'slug' => Str::slug('PSU'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Nguồn điện cho máy tính',
            ],
            [
                'category_name' => 'Fan & Tản Nhiệt',
                'slug' => Str::slug('Fan & Tản Nhiệt'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Quạt và hệ thống tản nhiệt cho máy tính',
            ],
            [
                'category_name' => 'Tản Nhiệt Nước',
                'slug' => Str::slug('Tản Nhiệt Nước'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Hệ thống tản nhiệt bằng nước cho máy tính',
            ],
            [
                'category_name' => 'Màn Hình',
                'slug' => Str::slug('Màn Hình'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Màn hình hiển thị cho máy tính',
            ],
            [
                'category_name' => 'Bàn Phím',
                'slug' => Str::slug('Bàn Phím'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Bàn phím cho máy tính',
            ],
            [
                'category_name' => 'Chuột',
                'slug' => Str::slug('Chuột'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Chuột máy tính',
            ],
            [
                'category_name' => 'Tai Nghe',
                'slug' => Str::slug('Tai Nghe'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Tai nghe cho máy tính',
            ],
            [
                'category_name' => 'Loa',
                'slug' => Str::slug('Loa'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Loa cho máy tính',
            ],
            [
                'category_name' => 'Thiết Bị Mạng',
                'slug' => Str::slug('Thiết Bị Mạng'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Thiết bị mạng cho máy tính',
            ],
            [
                'category_name' => 'Ghế Gaming',
                'slug' => Str::slug('Ghế Gaming'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Ghế ngồi cho game thủ',
            ],
            [
                'category_name' => 'Bàn Gaming',
                'slug' => Str::slug('Bàn Gaming'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Bàn làm việc cho game thủ',
            ],
            [
                'category_name' => 'Webcam',
                'slug' => Str::slug('Webcam'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Camera web cho máy tính',
            ],
            [
                'category_name' => 'Phụ Kiện PC',
                'slug' => Str::slug('Phụ Kiện PC'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Các phụ kiện khác cho máy tính',
            ],
            [
                'category_name' => 'Thiết Bị Âm Thanh',
                'slug' => Str::slug('Thiết Bị Âm Thanh'),
                   'image' => 'https://nguyencongpc.vn/media/category/cat_icon_3300_1693385781.jpg',
                'description' => 'Thiết bị âm thanh cho máy tính',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
