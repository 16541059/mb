<?php

namespace Database\Factories;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Slider::class;
    public function definition()
    {
        return [
            'active'=>rand(0,1),
            'name' => $this->faker->name,
            'title' => $this->faker->name,
            'images' => $this->faker->imageUrl($width = 1920, $height = 1000),
        ];
    }
}
