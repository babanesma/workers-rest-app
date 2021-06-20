<?php

namespace Database\Factories;

use App\Models\Shift;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'worker_id' => Worker::factory()->make()->id,
            'shift_date' => $this->faker->date(),
            'shift_time' => $this->faker->randomElement(Shift::SHIFT_TIMES)
        ];
    }
}
