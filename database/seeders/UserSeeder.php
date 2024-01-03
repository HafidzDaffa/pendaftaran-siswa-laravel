<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => "admin",
            'email' => "admin@admin.com",
            'no_wa' => "0813212321312",
            'password' => Hash::make('12341234'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
    }
}
