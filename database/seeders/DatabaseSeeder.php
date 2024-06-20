<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $colors = [
            ['color_name' => 'Trắng', 'color_code' => '#ffffff'],
            ['color_name' => 'Xanh Biển', 'color_code' => '#0000ff'],
            ['color_name' => 'Đỏ', 'color_code' => '#ff0000'],
            ['color_name' => 'Tím', 'color_code' => '#800080'],
            ['color_name' => 'Vàng', 'color_code' => '#ffff00'],
            ['color_name' => 'Đen', 'color_code' => '#000000'],
            ['color_name' => 'Xanh Lá', 'color_code' => '#008000'],
            ['color_name' => 'Cam', 'color_code' => '#ffa500'],
            ['color_name' => 'Hồng', 'color_code' => '#ff69b4'],
            ['color_name' => 'Nâu', 'color_code' => '#a52a2a'],
        ];
        $sizes = [
            ['size_name' => 'S', 'size_description' => 'Cao: 1m60-1m65, Nặng: 55-60kg'],
            ['size_name' => 'M', 'size_description' => 'Cao: 1m64-1m69, Nặng: 60-65kg'],
            ['size_name' => 'L', 'size_description' => 'Cao: 1m70-1m74, Nặng: 66-70kg'],
            ['size_name' => 'XL', 'size_description' => 'Cao: 1m74-1m76, Nặng: 70-76kg'],
            ['size_name' => '2XL', 'size_description' => 'Cao: 1m76-1m80, Nặng: 76-80kg'],
            ['size_name' => '3XL', 'size_description' => 'Cao: 1m76-1m80, Nặng: 76-80kg'],
            ['size_name' => '4XL', 'size_description' => 'Cao: 1m76-1m80, Nặng: 76-80kg'],
        ];
        $category = [
            ['name' => 'Thời trang nam', 'parent_id' => null],
            ['name' => 'Quần áo mùa hè', 'parent_id' => 1],
            ['name' => 'Quần áo công sở', 'parent_id' => 1],
            ['name' => 'Quần đùi', 'parent_id' => 2],
            ['name' => 'Áo phông', 'parent_id' => 2],
            ['name' => 'Áo sơ mi', 'parent_id' => 3],
            ['name' => 'Quần âu', 'parent_id' => 3],
            ['name' => 'Thời trang nữ', 'parent_id' => null],
            ['name' => 'Đầm', 'parent_id' => 8],
            ['name' => 'Váy', 'parent_id' => 8],
            ['name' => 'Váy ngắn', 'parent_id' => 10],
            ['name' => 'Váy dài', 'parent_id' => 10],
        ];
        foreach ($category as $data) {
            \App\Models\Category::factory()->create($data);
        }
        \App\Models\User::factory(30)->create();
        \App\Models\Product::factory(30)->create();
        \App\Models\DetailImages::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Quang Minh',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        \App\Models\Supplier::factory(30)->create();
        foreach ($colors as $data) {
            \App\Models\Color::factory()->create($data);
        }
        foreach ($sizes as $data) {
            \App\Models\Size::factory()->create($data);
        }
    }
}
