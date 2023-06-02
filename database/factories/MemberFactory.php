<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition()
    {
        return [
            'member_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('123456'), // Ganti dengan password yang sesuai
            'username' => $this->faker->userName,
            'member_gender' => $this->faker->randomElement(['L', 'P']),
            'member_address' => $this->faker->address,
        ];
    }
}
