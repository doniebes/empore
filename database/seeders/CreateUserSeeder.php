<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
                    [
                        'name' => 'Admin',
                        'email' => 'admin@admin.com',
                        'password' => bcrypt('123456'),
                    ],
                    [
                        'name' => 'dsbahri',
                        'email' => 'ebes.doni@gmail.com',
                        'password' => bcrypt('123456'),
                    ]
                ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
