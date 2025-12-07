<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Technician;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Morilog\Jalali\Jalalian;

#[Layout('layouts.lay')]
class CreateAppointment extends Component
{
    // پراپرتی‌ها
    public $services = [], $technicians = [];
    public $selectedService, $selectedTechnician;
    public $date, $time, $address;
    public $availableSlots = [];
    public $step = 1;
    public $showTechnicianSuggestions = false;
    public $suggestedTechnicians = [];

    // پیام‌های خطای سفارشی
    protected $messages = [
        'selectedService.required'    => 'لطفاً یک خدمت انتخاب کنید',
        'selectedService.exists'      => 'خدمت انتخاب شده معتبر نیست',
        'date.required'               => 'لطفاً تاریخ را وارد کنید',
        'address.required'            => 'لطفاً آدرس را وارد کنید',
        'address.min'                 => 'آدرس باید حداقل :min کاراکتر باشد',
        'selectedTechnician.required' => 'انتخاب سرویس‌کار الزامی است',
        'selectedTechnician.exists'   => 'سرویس‌کار انتخاب شده معتبر نیست',
        'time.required'               => 'لطفاً یک زمان انتخاب کنید',
    ];

    public function mount()
    {
        $this->services = Service::all();
        $this->technicians = Technician::where('is_available', true)->get();
    }

    // مرحله بعدی فرم
    public function nextStep()
    {
        $this->validate([
            'selectedService' => 'required|exists:services,id',
            'date'            => 'required',
            'address'         => 'required|min:5',
            'selectedTechnician' => 'required',
        ]);
         try {
        $carbonDate = $this->parseDate($this->date);
    } catch (\Exception $e) {
        session()->flash('error', $e->getMessage());
        return;
    }

    // جلوگیری از انتخاب تاریخ گذشته
    $today = Carbon::today();
    if (Carbon::parse($carbonDate)->lt($today)) {
        session()->flash('error', 'تاریخ انتخاب شده نمی‌تواند در گذشته باشد.');
        return;
    }

        try {
            $this->availableSlots = $this->generateTimeSlots();
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return;
        }

        $this->step = 2;
    }

    // بازگشت به مرحله قبل
    public function prevStep()
    {
        $this->step = 1;
    }

    // پیشنهاد سرویس‌کار
    public function suggestTechnicians()
    {
        $this->showTechnicianSuggestions = true;
        $this->suggestedTechnicians = Technician::where('is_available', true)
            ->inRandomOrder()
            ->limit(2)
            ->get();
    }

    // تولید اسلات‌های زمانی
    public function generateTimeSlots()
    {
        $slots = [];

        if (!$this->selectedService || !$this->selectedTechnician || !$this->date) {
            return $slots;
        }

        $service = Service::find($this->selectedService);
        $duration = $service->duration ?? 60;

        try {
            $carbonDate = $this->parseDate($this->date);
        } catch (\Exception $e) {
            throw new \Exception("تاریخ انتخاب شده نامعتبر است.");
        }

        $start = Carbon::parse("$carbonDate 08:00");
        $end   = Carbon::parse("$carbonDate 17:00");

        while ($start->lt($end)) {
            $slotEnd = $start->copy()->addMinutes($duration);
            if ($slotEnd->gt($end)) break;

            $slots[] = [
                'id' => $start->format('H:i') . '-' . $slotEnd->format('H:i'),
                'display_persian' => $this->convertToPersianNumbers($start->format('H:i')) .
                                     ' تا ' .
                                     $this->convertToPersianNumbers($slotEnd->format('H:i')),
                'available' => true,
            ];

            $start->addMinutes($duration);
        }

        return $slots;
    }

    // ثبت نوبت
    public function save()
{
    $this->validate([
        'time' => 'required',
        'selectedTechnician' => 'required|exists:technicians,id',
        'date' => 'required',
    ]);

    try {
        $carbonDate = $this->parseDate($this->date);
    } catch (\Exception $e) {
        session()->flash('error', $e->getMessage());
        return;
    }

    [$start, $end] = explode('-', $this->time);

    // بررسی نوبت تکراری
    $existing = Appointment::where('technician_id', $this->selectedTechnician)
        ->where('date', $carbonDate)
         ->where('start_time', "$carbonDate $start")
         ->whereIn('status', ['pending', 'confirmed']) // فقط نوبت‌های فعال
        ->first();

    if ($existing) {
        session()->flash('error', 'این زمان برای این سرویس‌کار قبلاً رزرو شده است');
        return;
    }

    Appointment::create([
        'user_id'       => auth()->id(),
        'service_id'    => $this->selectedService,
        'technician_id' => $this->selectedTechnician,
        'date'          => $carbonDate,
        'address'       => $this->address,
        'time'          => $this->time,
        'start_time'    => "$carbonDate $start",
        'end_time'      => "$carbonDate $end",
        'status'        => 'pending',
    ]);

    session()->flash('success', 'نوبت شما با موفقیت ثبت شد');
    return redirect()->route('appointments.index');
}


    // 🔹 تبدیل تاریخ شمسی به میلادی
    private function parseDate($date)
    {
        if (!$date) {
            throw new \Exception('لطفاً تاریخ را وارد کنید');
        }

        $normalized = str_replace('-', '/', $date);
        $normalized = $this->convertPersianToEnglishNumbers($normalized);

        if (preg_match('/^\d{4}\/\d{2}\/\d{2}$/', $normalized)) {
            $jalali = Jalalian::fromFormat('Y/m/d', $normalized);
            return $jalali->toCarbon()->format('Y-m-d');
        }

        return Carbon::parse($normalized)->format('Y-m-d');
    }

    // 🔹 تبدیل اعداد فارسی به انگلیسی
    private function convertPersianToEnglishNumbers($string)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        return str_replace($persian, $english, $string);
    }

    // 🔹 تبدیل اعداد انگلیسی به فارسی
    private function convertToPersianNumbers($string)
    {
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        return str_replace($english, $persian, $string);
    }

    public function render()
    {
        return view('livewire.create-appointment');
    }
}
