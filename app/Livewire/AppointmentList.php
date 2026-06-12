<?php

namespace App\Livewire;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Enums\AppointmentStatus;

class AppointmentList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    
    public $perPage = 10;

    protected $listeners = [
        'search-updated' => 'handleSearchUpdate'
    ];

    public $pageTitle = 'لیست درخواست‌ها';

    public $breadcrumbs = [
        [
            'title' => 'داشبورد',
            'url' => '/dashboard'
        ],
        [
            'title' => 'لیست درخواست‌ها',
            'url' => null
        ]
    ];

    public function mount()
    {
        $this->search = request('search', '');
    }

    public function handleSearchUpdate($searchValue)
    {
        $this->search = $searchValue;

        $this->resetPage();
    }

    public function render()
    {
        $layout = (
            Auth::check()
            && Auth::user()->role === 'admin'
        )
            ? 'layouts.admin'
            : 'layouts.lay';

        $query = Appointment::with([
            'service',
            'user'
        ]);

        if (
            !Auth::check()
            || Auth::user()->role !== 'admin'
        ) {
            $query->where(
                'user_id',
                auth()->id()
            );
        }

        $appointments = $query
            ->when($this->search, function ($q) {

                $q->where(function ($q2) {

                    $q2->whereHas('service', function ($serviceQuery) {

                        $serviceQuery->where(
                            'name',
                            'like',
                            '%' . $this->search . '%'
                        );
                    })->orWhere(
                        'address',
                        'like',
                        '%' . $this->search . '%'
                    );
                });
            })
            ->latest()
           ->paginate($this->perPage);

        return view('livewire.appointment-list', [
            'appointments' => $appointments,
        ])->layout($layout, [
            'pageTitle'   => $this->pageTitle,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
    public function updateStatus(
    int $appointmentId,
    string $newStatus
): void {

    if (
        !Auth::check()
        || Auth::user()->role !== 'admin'
    ) {
        abort(403);
    }

    $status = AppointmentStatus::tryFrom($newStatus);

    if (! $status) {

        $this->dispatch(
            'show-toast',
            message: 'وضعیت انتخاب شده نامعتبر است',
            type: 'error'
        );

        return;
    }

    $appointment = Appointment::findOrFail(
        $appointmentId
    );

    $appointment->update([
        'status' => $newStatus
    ]);

    $this->dispatch(
        'show-toast',
        message: 'وضعیت درخواست به «' . $status->label() . '» تغییر یافت',
        type: 'success'
    );
}
}
