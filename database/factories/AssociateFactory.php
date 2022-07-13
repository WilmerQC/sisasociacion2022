<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Associate>
 */
class AssociateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique->firstName,
            'lastname'=>$this->faker->lastName,
            'dni'=>$this->faker->randomNumber(8),
            'phone'=>$this->faker->phoneNumber,
            'birthdate'=>$this->faker->date,
            'email'=>$this->faker->email,
            'address'=>$this->faker->address,
            'user_id'=>User::all()->random()->id,
        ];
    }
}
