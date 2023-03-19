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



        \App\Models\Role::factory()->create([
            'type' => 'admin',
        ]);
        \App\Models\Role::factory()->create([
            'type' => 'operator',
        ]);
        \App\Models\Role::factory()->create([
            'type' => 'technician',
        ]);
        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);
        \App\Models\User::factory()->create([
            'email' => 'tehnicar@tehnicar.com',
            'password' => Hash::make('tehnicar'),
            'role_id' => 3
        ]);
        \App\Models\User::factory()->create([
            'email' => 'operator@operator.com',
            'password' => Hash::make('operator'),
            'role_id' => 2
        ]);
        \App\Models\User::factory()->create([
            'email' => 'admin1@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);
        \App\Models\User::factory()->create([
            'email' => 'tehnicar1@tehnicar.com',
            'password' => Hash::make('tehnicar'),
            'role_id' => 3
        ]);
        \App\Models\User::factory()->create([
            'email' => 'operator1@operator.com',
            'password' => Hash::make('operator'),
            'role_id' => 2
        ]);
       
        \App\Models\Profile::factory()->create([
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18, 50),
            'user_id' => 1,
        ]);
        \App\Models\Profile::factory()->create([
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18, 50),
            'user_id' => 2,
        ]);
        \App\Models\Profile::factory()->create([
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18, 50),
            'user_id' => 3,
        ]);
        \App\Models\Profile::factory()->create([
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18, 50),
            'user_id' => 4,
        ]);
        \App\Models\Profile::factory()->create([
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18, 50),
            'user_id' => 5,
        ]);
        \App\Models\Profile::factory()->create([
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'age' => fake()->numberBetween(18, 50),
            'user_id' => 6,
        ]);

        for ($i = 0; $i < 6; $i++) {

            \App\Models\UserContactInfo::factory()->create([
                'adress' => fake()->streetAddress(),
                'city' => fake()->city(),
                'phone' => fake()->phoneNumber(),
                'profile_id' => $i+1
            ]);
        }
    }
}
