<?php

namespace Database\Factories;

use App\Models\HomeSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeSliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomeSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title              = $this->faker->unique()->words($nb = 4, $asText = true);
        $subtitle           = $this->faker->text(40);
        $price              = $this->faker->numberBetween(10,500);
        $link               = 'www.example.com';
        $status             = $this->faker->numberBetween(0,1);
        $image              = 'digital_'.$this->faker->unique()->numberBetween(1,22).'.jpg';


        return [
            'title'             => $title,
            'subtitle'          => $subtitle,
            'price'             => $price,
            'link'              => $link,
            'status'            => $status,
            'image'             => $image,
            

        ];
    }
}
