<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class CreateBookSeeder extends Seeder
{
    public function run()
    {
        Book::factory()->count(10)->create();
        // Ganti '10' dengan jumlah anggota yang ingin Anda buat
    }
}
