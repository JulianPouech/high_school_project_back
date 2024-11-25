<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('roles')->insert([
            'name' => 'customer'
        ]);

        DB::table('roles')->insert([
            'name' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => Hash::make('pwd2019'),
            'role_id' => 0
        ]);

        User::factory()->create([
            'name' => 'admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('pwd2019'),
            'role_id' => 1
        ]);

    }
}
