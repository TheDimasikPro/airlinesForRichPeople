<?php

namespace Database\Factories;

use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class PassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passenger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName(),
            "first_name" => $this->faker->firstName(),
            "other_name" => Str::random(10),
            "id_gender_code" => rand(1,2),
            "id_citizenship" => rand(1,100),
            "date_of_birthday" => Carbon::now(),
            "id_document_type" => rand(1,3),
            "series_and_document_number" => mt_rand(),
            "row_number_from" => rand(1,10),
            "row_number_back" => rand(1,10),
            "place_number_from" => rand(1,10),
            "place_number_back" => rand(1,10),
            "id_booking" => rand(1,10),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];
    }
}
