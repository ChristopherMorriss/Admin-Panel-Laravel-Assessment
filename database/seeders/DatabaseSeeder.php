<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Companies;
use App\Models\Employees;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => 'password',
            'admin' => '1'
        ]);
        User::factory(25)->create();
        Companies::factory(25)->create();
        Employees::factory(25)->create();
    }
}

//php artisan migrate:fresh --seed