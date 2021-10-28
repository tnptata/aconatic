<?php

namespace Database\Factories;

use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarrantyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warranty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_date' => $this->faker->dateTimeBetween('-15 days', '+15 days')
            ->format('Y-m-d H:i:s'),
            'expire_date' => $this->faker->dateTimeBetween('-15 days', '+15 days')
            ->format('Y-m-d H:i:s'),
            'user_id' =>  $this->faker->numberBetween(1,2)
        ];
    }
}


