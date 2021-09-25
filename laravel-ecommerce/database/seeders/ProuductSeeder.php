<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProuductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Prouduct::factory(10)->create();
    }
}