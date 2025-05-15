<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Equipment;
use App\Models\Position;
use App\Models\Priority;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([

            UsersSeeder::class,
            EquipmentSeeder::class,
            ProblemSeeder::class,
            PositionSeeder::class,
            PrioritySeeder::class,
            RepairSeeder::class,
            Equipment_roomSeeder::class,
           
          
            
        ]);
    }
}
