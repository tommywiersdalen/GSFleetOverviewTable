<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FleetVehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        FleetVehicle::factory(10)->underused()->create();
        FleetVehicle::factory(80)->normal()->create();
        FleetVehicle::factory(10)->overused()->create();
    }
}
