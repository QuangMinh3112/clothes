<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'product_name' => fake()->name(),
            'product_image' => 'https://product.hstatic.net/200000239547/product/z4856567973210_f9f31c0d7410d22a07eca71d6796d196_259dce0a0f2f4ec986ff8637d3f45280_1024x1024.jpg',
            'product_description' => fake()->paragraph(5),
            'import_price' => fake()->numberBetween(10, 50) * 1000,
            'retail_price' => fake()->numberBetween(100, 200) * 1000,
            'category_id' => fake()->numberBetween(1, 10),
            'supplier_id' => fake()->numberBetween(1, 30),
        ];
    }
}
