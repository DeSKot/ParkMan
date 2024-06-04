<?php

namespace Database\Seeders;

use App\Models\GaragesGeneral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GarageGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GaragesGeneral::factory()->count(1000)->create();
    }
}
