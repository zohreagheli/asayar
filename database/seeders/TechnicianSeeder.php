<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technician;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technicians = [
            ['name' => 'محمد رضایی', 'phone' => '09123456789', 'expertise' => 'نصب و تعمیر آسانسور'],
            ['name' => 'علی محمدی', 'phone' => '09129876543', 'expertise' => 'تعمیرات تخصصی'],
            ['name' => 'رضا حسینی', 'phone' => '09351234567', 'expertise' => 'سرویس دوره‌ای'],
            ['name' => 'سیستم پیشنهادی', 'phone' => null, 'expertise' => 'انتخاب خودکار بهترین سرویس‌کار']
        ];
        foreach ($technicians as $technician) {
            Technician::create($technician);
        }
    }
}
