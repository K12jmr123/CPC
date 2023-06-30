<?php

namespace Database\Seeders;

use App\Models\record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class records extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        record::factory()->count(70)->create();
    }
}