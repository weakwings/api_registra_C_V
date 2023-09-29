<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Compra;
use Database\Factories\CompraFactory;

class CompraSeeder extends Seeder
{
    public function run()
    {
        Compra::factory(20)->create();
    }
}