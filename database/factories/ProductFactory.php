<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name       = $this->faker->unique()->words($nb = 4, $asText = true);
        $slug               = Str::slug($product_name);
        $short_description  = $this->faker->text(200);
        $description        = $this->faker->text(500);
        $regular_price      = $this->faker->numberBetween(10,500);
        $sku                = 'DIGI'.$this->faker->unique()->numberBetween(100, 200);
        $stock_status       = 'instock';
        $quantity           = $this->faker->numberBetween(100,200);
        $image              = 'digital_'.$this->faker->unique()->numberBetween(1,22).'.jpg';
        $category_id        = $this->faker->numberBetween(1,5);


        return [
            'name'              => $product_name,
            'slug'              => $slug,
            'short_description' => $short_description,
            'description'       => $description,
            'regular_price'     => $regular_price,
            'sku'               => $sku,
            'stock_status'      => $stock_status,
            'quantity'          => $quantity,
            'image'             => $image,
            'category_id'       => $category_id,

        ];
    }
}
