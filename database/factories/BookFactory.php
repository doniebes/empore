<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        $code = strtoupper($this->faker->randomLetter() . $this->faker->randomNumber(4));

        return [
            'code' => $code,
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'publication_year' => $this->faker->year,
            'stock' => $this->faker->randomNumber(2),
        ];
    }
}
