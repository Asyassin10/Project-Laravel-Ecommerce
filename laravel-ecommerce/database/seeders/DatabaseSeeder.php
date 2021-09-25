<?php

namespace Database\Seeders;

use App\Models\Prouduct;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProuductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(AdminSeeder::class);

    }
}