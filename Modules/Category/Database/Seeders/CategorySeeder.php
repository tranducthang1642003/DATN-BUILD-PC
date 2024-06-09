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
                'name' => 'PC Workstation',
                'slug' => Str::slug('PC Workstation'),
                'description' => 'Thiết bị máy tính dành cho công việc văn phòng và các nhu cầu chuyên sâu khác',
            ],
            [
                'name' => 'PC Mini',
                'slug' => Str::slug('PC Mini'),
                'description' => 'Máy tính nhỏ gọn, tiết kiệm không gian phù hợp cho nhu cầu cơ bản',
            ],
            [
                'name' => 'PC Doanh Nhân',
                'slug' => Str::slug('PC Doanh Nhân'),
                'description' => 'Thiết bị máy tính được thiết kế và đặc biệt phù hợp cho doanh nhân',
            ],
            [
                'name' => 'PC Đồ Họa',
                'slug' => Str::slug('PC Đồ Họa'),
                'description' => 'Máy tính được tối ưu hóa cho công việc đồ họa, thiết kế và làm phim',
            ],
            [
                'name' => 'Mainboard',
                'slug' => Str::slug('Mainboard'),
                'description' => 'Bo mạch chủ cho việc lắp ráp máy tính',
            ],
            [
                'name' => 'CPU',
                'slug' => Str::slug('CPU'),
                'description' => 'Bộ vi xử lý cho máy tính',
            ],
            [
                'name' => 'VGA',
                'slug' => Str::slug('VGA'),
                'description' => 'Card đồ họa cho máy tính',
            ],
            [
                'name' => 'RAM',
                'slug' => Str::slug('RAM'),
                'description' => 'Bộ nhớ truy cập ngẫu nhiên cho máy tính',
            ],
            [
                'name' => 'SSD',
                'slug' => Str::slug('SSD'),
                'description' => 'Ổ cứng thể rắn cho lưu trữ nhanh chóng',
            ],
            [
                'name' => 'HDD',
                'slug' => Str::slug('HDD'),
                'description' => 'Ổ cứng cơ học cho lưu trữ dữ liệu lớn',
            ],
            [
                'name' => 'Case',
                'slug' => Str::slug('Case'),
                'description' => 'Vỏ máy tính để lắp ráp các linh kiện',
            ],
            [
                'name' => 'PSU',
                'slug' => Str::slug('PSU'),
                'description' => 'Nguồn điện cho máy tính',
            ],
            [
                'name' => 'Fan & Tản Nhiệt',
                'slug' => Str::slug('Fan & Tản Nhiệt'),
                'description' => 'Quạt và hệ thống tản nhiệt cho máy tính',
            ],
            [
                'name' => 'Tản Nhiệt Nước',
                'slug' => Str::slug('Tản Nhiệt Nước'),
                'description' => 'Hệ thống tản nhiệt bằng nước cho máy tính',
            ],
            [
                'name' => 'Màn Hình',
                'slug' => Str::slug('Màn Hình'),
                'description' => 'Màn hình hiển thị cho máy tính',
            ],
            [
                'name' => 'Bàn Phím',
                'slug' => Str::slug('Bàn Phím'),
                'description' => 'Bàn phím cho máy tính',
            ],
            [
                'name' => 'Chuột',
                'slug' => Str::slug('Chuột'),
                'description' => 'Chuột máy tính',
            ],
            [
                'name' => 'Tai Nghe',
                'slug' => Str::slug('Tai Nghe'),
                'description' => 'Tai nghe cho máy tính',
            ],
            [
                'name' => 'Loa',
                'slug' => Str::slug('Loa'),
                'description' => 'Loa cho máy tính',
            ],
            [
                'name' => 'Thiết Bị Mạng',
                'slug' => Str::slug('Thiết Bị Mạng'),
                'description' => 'Thiết bị mạng cho máy tính',
            ],
            [
                'name' => 'Ghế Gaming',
                'slug' => Str::slug('Ghế Gaming'),
                'description' => 'Ghế ngồi cho game thủ',
            ],
            [
                'name' => 'Bàn Gaming',
                'slug' => Str::slug('Bàn Gaming'),
                'description' => 'Bàn làm việc cho game thủ',
            ],
            [
                'name' => 'Webcam',
                'slug' => Str::slug('Webcam'),
                'description' => 'Camera web cho máy tính',
            ],
            [
                'name' => 'Phụ Kiện PC',
                'slug' => Str::slug('Phụ Kiện PC'),
                'description' => 'Các phụ kiện khác cho máy tính',
            ],
            [
                'name' => 'Thiết Bị Âm Thanh',
                'slug' => Str::slug('Thiết Bị Âm Thanh'),
                'description' => 'Thiết bị âm thanh cho máy tính',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
