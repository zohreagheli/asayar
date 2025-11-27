<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Service::insert([
            ['name' => 'نصب آسانسور', 'duration' => 120],
            ['name' => 'تعمیر آسانسور', 'duration' => 60]
        ]);
    }
}
