<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Section;
use App\Models\Equipement;
use App\Models\OpenTicket;
use App\Models\TicketCategory;
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
        Equipement::factory()->create([
            'section_id' => Section::factory()->create([
                'name' => 'przenje'
            ])
        ]);
        Equipement::factory()->create([
            'section_id' => Section::factory()->create([
                'name' => 'mlevenje'
            ])
        ]);
        Equipement::factory()->create([
            'section_id' => Section::factory()->create([
                'name' => 'pakovanje'
            ])
        ]);
        // Equipement::factory(10)->create();
        Equipement::factory(10)->create();

        User::factory()->create([
            'email' => 'admin@test.com',
            'password' => Hash::make('Admin123'),
            'role_id' => Role::factory()->create([
                'type' => 'admin'
            ])
        ]);
        User::factory()->create([
            'email' => 'menadzer@test.com',
            'password' => Hash::make('Menadzer123'),
            'role_id' => Role::factory()->create([
                'type' => 'manager'
            ])
        ]);
        User::factory()->create([
            'email' => 'operater@test.com',
            'password' => Hash::make('Operater123'),
            'role_id' => Role::factory()->create([
                'type' => 'operator'
            ])
        ]);

        User::factory()->create([
            'email' => 'tehnicar@test.com',
            'password' => Hash::make('Tehnicar123'),
            'role_id' => Role::factory()->create([
                'type' => 'technician'
            ])
        ]);

        User::factory()->create([
            'email' => 'employee@test.com',
            'password' => Hash::make('Employee123'),
            'role_id' => Role::factory()->create([
                'type' => 'employee'
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


        OpenTicket::factory()->create([
            'description' => 'sadasd',
            'user_id' => 1,
            'equipement_id' => 1,
            'ticket_category_id' => TicketCategory::factory()->create([
                'category' => 'Elektro'
            ]),
        ]);
        OpenTicket::factory()->create([
            'description' => 'sadasd',
            'user_id' => 1,
            'equipement_id' => 1,
            'ticket_category_id' => 1,
        ]);
        OpenTicket::factory()->create([
            'description' => 'sadasds',
            'user_id' => 1,
            'equipement_id' => 1,
            'ticket_category_id' => TicketCategory::factory()->create([
                'category' => 'Mehanika'
            ])
        ]);

        TicketCategory::factory()->create([
            'category' => 'Ostalo'
        ]);
    }
}
