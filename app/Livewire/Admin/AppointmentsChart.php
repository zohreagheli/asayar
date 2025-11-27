<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Appointment;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;

#[Layout('layouts.lay')]
class AppointmentsChart extends Component
{
    public $dates = [];
    public $totals = [];

    public function mount()
    {
        $userId = auth()->id(); // شناسه کاربر فعلی

        // دریافت آمار سرویس‌های کاربر فعلی بر اساس تاریخ ثبت
        $services = Appointment::select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as total')
                )
                ->where('user_id', $userId) // 👈 فقط داده‌های کاربر فعلی
                ->groupBy(DB::raw('DATE(created_at)'))
                ->orderBy('date', 'asc')
                ->get();

        // تبدیل تاریخ‌ها به شمسی
        $this->dates = $services->pluck('date')->map(function($d) {
            return Jalalian::fromCarbon(Carbon::parse($d))->format('Y/m/d');
        })->toArray();

        // تعداد سرویس‌ها
        $this->totals = $services->pluck('total')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.appointments-chart');
    }
}
