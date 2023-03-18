<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        \App\Models\User::factory()->create([
            'email' => 'tehnicar@tehnicar.com',
            'password' => Hash::make('tehnicar'),
        ]);
        \App\Models\User::factory()->create([
            'email' => 'operator@operator.com',
            'password' => Hash::make('operator'),
        ]);

        \App\Models\Role::factory()->create([
            'type' => 'admin',
        ]);
        \App\Models\Role::factory()->create([
            'type' => 'operator',
        ]);
        \App\Models\Role::factory()->create([
            'type' => 'technician',
        ]);

        \App\Models\Profile::factory()->create([
            'username' => 'Test',
            'first_name' => 'Test',
            'last_name' => 'Test',
            'age' => 25,
            'user_id' => 1,
            'role_id' => 1,
        ]);
        \App\Models\Profile::factory()->create([
            'username' => 'Test',
            'first_name' => 'Test',
            'last_name' => 'Test',
            'age' => 25,
            'user_id' => 2,
            'role_id' => 3,
        ]);
        \App\Models\Profile::factory()->create([
            'username' => 'Test',
            'first_name' => 'Test',
            'last_name' => 'Test',
            'age' => 25,
            'user_id' => 3,
            'role_id' => 2,
        ]);
    }
}
