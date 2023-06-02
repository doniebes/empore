<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class CreateMemberSeeder extends Seeder
{
    public function run()
    {
        Member::factory()->count(100)->create();
        // Ganti '10' dengan jumlah anggota yang ingin Anda buat
    }
}
