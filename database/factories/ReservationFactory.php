<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $from = $this->faker->date();
        $days = $this->faker->numberBetween(1, 60);

        return [
            'from' => $from,
            'to' => date('Y-m-d', strtotime($from. ' + '.$days.' days')),
            'book_id' => Book::inRandomOrder()->first()->id,
            'status' => 0
        ];
    }
}
