<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Barang::factory(1)->create();
        \App\Models\JenisBarang::factory(1)->create();
        \App\Models\Satuan::factory(1)->create();
    }
}
