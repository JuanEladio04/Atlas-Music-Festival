<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pass;

class PassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pass::factory()->count(50)->create();
    }
}
