<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::UpdateOrCreate([
            "name" => "SUNHILL Trading",
            "email" => "support@sunhill.com",
            "phone" => "123456789",
            "username" => "SUNHILL Admin",
            "password" => Hash::make("12345678"),
            "role" => "admin"
        ]);
    }
}
