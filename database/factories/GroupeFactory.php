<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'nom'=>$this->faker->name(),
            'description'=>$this->faker->sentence(),
            'logo'=>'logoRobotique.png',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
    }
}
