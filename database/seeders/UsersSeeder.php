<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $items = [
            [   
                'name' => 'superadmin',
                'role' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'status_validasi' => 0,
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($items as $item){
            User::create($item);
        }
    }
}
