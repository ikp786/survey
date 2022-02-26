<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name'        => 'Admin',
            'last_name'         => 'Admin',
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make('Admin@123'),
        ]);
    }
}