<?php

namespace App\Rules;

use App\Models\Appointment;
use Morilog\Jalali\Jalalian;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TechnicianAvailability implements ValidationRule
{
    protected $technicianId;
    protected $date;
    protected $time;

    public function __construct($technicianId, $date, $time)
    {
        $this->technicianId = $technicianId;
        $this->date = $date;
        $this->time = $time;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // اگر technicianId عدد معتبری نیست، validation را pass کنید
        if (!is_numeric($this->technicianId) || $this->technicianId <= 0) {
            return;
        }

        // تبدیل تاریخ شمسی به میلادی
        $gregorianDate = Jalalian::fromFormat('Y-m-d', $this->date)
            ->toCarbon()
            ->format('Y-m-d');

        // تقسیم زمان به start و end
        $timeParts = explode(' - ', $this->convertToEnglishTime($this->time));
        $startTime = $gregorianDate . ' ' . $timeParts[0];
        $endTime = $gregorianDate . ' ' . $timeParts[1];

        // بررسی تداخل نوبت برای سرویس‌کار
        $conflicting = Appointment::where('technician_id', $this->technicianId)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime])
                    ->orWhere(function ($q) use ($startTime, $endTime) {
                        $q->where('start_time', '<=', $startTime)
                            ->where('end_time', '>=', $endTime);
                    });
            })
            ->where('status', '!=', 'canceled')
            ->exists();

        if ($conflicting) {
            $fail('این سرویس‌کار در زمان انتخاب شده مشغول است. لطفاً زمان دیگری انتخاب کنید.');
        }
    }

    private function convertToEnglishTime($persianTime)
    {
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = range(0, 9);
        return str_replace($persianNumbers, $englishNumbers, $persianTime);
    }
}
