<?php

namespace Database\Seeders;

use App\Models\sensordata;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensordataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sensordata::factory(10)->create();
    }
}
