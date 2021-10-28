<?php

namespace Database\Factories;

use App\Models\Claimlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClaimlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Claimlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => "รอชำระ",
            'damage' => $this->faker->firstName(),
            'date' => $this->faker->dateTimeBetween('-15 days', '+15 days')
            ->format('Y-m-d H:i:s')
        ];
    }
}


