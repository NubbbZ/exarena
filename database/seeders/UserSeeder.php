<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'NubbbZ',
            'email' => 'admin' . '@' . parse_url(config('app.url', 'example.com'), PHP_URL_HOST),
            'password' => Hash::make('changeme'),
            'role' => 'admin'
        ]);
    }
}
