<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
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

        User::factory()->create([
            'email'=> 'admin@test.com',
            'password'=>Hash::make('Admin123'),
            'role_id' => Role::factory()->create([
                'type' => 'admin'
            ])
        ]);

        User::factory()->create([
            'email'=> 'operater@test.com',
            'password'=>Hash::make('Operater123'),
            'role_id' => Role::factory()->create([
                'type' => 'operator'
            ])
        ]);

        User::factory()->create([
            'email'=> 'tehnicar@test.com',
            'password'=>Hash::make('Tehnicar123'),
            'role_id' => Role::factory()->create([
                'type' => 'technician'
            ])
        ]);

        User::factory(3)->create([
            'role_id' => 1
        ]);

        User::factory(3)->create([
            'role_id' => 2
        ]);

        User::factory(3)->create([
            'role_id' => 3
        ]);
    }
}
