<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = $this->faker->numberBetween(1,100);
        return [
            "name"=> $this->faker->title(10),
            "author"=> $this->faker->firstName(2) . $this->faker->lastName,
            "category" => $this->faker->randomElement(["Toán","Văn", "Anh", 
            "CNTT", "HTTT", "An ninh mạng", "Công trình", "Lý", "Hóa", "Sinh"]),
            "year" => $this->faker->year,   
            "quantity" => $quantity,
            "remaining_quantity" => $quantity
        ];
    }
}
