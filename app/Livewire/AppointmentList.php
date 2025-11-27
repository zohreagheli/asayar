<?php

namespace App\Livewire;
use Livewire\Attributes\Layout;
use App\Models\Appointment;
use App\Models\Service;
use Morilog\Jalali\Jalalian;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
class AppointmentList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $success = null;
    protected $listeners = ['search-updated' => 'handleSearchUpdate'];

    public function handleSearchUpdate($searchValue)
    {
        $this->search = $searchValue;
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = request('search', '');
    }

    public function render()
    {
        // انتخاب layout بر اساس نقش کاربر
        $layout = (Auth::check() && Auth::user()->role === 'admin')
            ? 'layouts.admin'
            : 'layouts.lay';

        // اگر ادمین است همه را می‌بیند، در غیر این صورت فقط نوبت‌های خودش
        if (Auth::check() && Auth::user()->role === 'admin') {
            $query = Appointment::with(['service', 'technician', 'user']);
        } else {
            $query = Appointment::with(['service', 'technician'])
                ->where('user_id', auth()->id());
        }

        $appointments = $query
            ->when($this->search, function ($q) {
                $q->where(function ($q2) {
                    $q2->whereHas('service', function ($serviceQuery) {
                        $serviceQuery->where('name', 'like', '%' . $this->search . '%');
                    })
                        ->orWhere('address', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->through(function ($appointment, $index) {
                $appointment->persian_date = $this->convertToPersianDateTime($appointment->start_time);
                $appointment->row_number = $this->calculateRowNumber($index);
                return $appointment;
            });

        // 🔹 ارسال داده‌ها به view به همراه layout متناسب
        return view('livewire.appointment-list', [
            'appointments' => $appointments,
            'persianDate' => Jalalian::now()->format('Y/m/d'),
            'dayName' => Jalalian::now()->format('l'),
        ])->layout($layout);
    }

    public function updateStatus($appointmentId, $newStatus)
    {
        $allowed = ['pending', 'confirmed', 'canceled'];
        if (!in_array($newStatus, $allowed)) {
            $this->dispatchBrowserEvent('toast', ['type' => 'error', 'message' => 'وضعیت نامعتبر.']);
            return;
        }

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'دسترسی غیرمجاز.');
        }

        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->status = $newStatus;
        $appointment->save();

        $this->success = 'وضعیت نوبت با موفقیت به «' . $this->getPersianStatus($newStatus) . '» تغییر کرد.';
    }

    private function calculateRowNumber($index)
    {
        return (request('page', 1) - 1) * 10 + $index + 1;
    }

    private function convertToPersianDateTime($datetime)
    {
        try {
            $jdate = Jalalian::fromDateTime($datetime);
            return $this->convertToPersianNumbers($jdate->format('Y/m/d H:i'));
        } catch (\Exception $e) {
            return $datetime;
        }
    }

    private function convertToPersianNumbers($input)
    {
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        return str_replace($english, $persian, $input);
    }

    private function getPersianStatus($status)
    {
        $statuses = [
            'pending' => 'در انتظار',
            'confirmed' => 'تأیید شده',
            'canceled' => 'لغو شده'
        ];
        return $statuses[$status] ?? $status;
    }
}
