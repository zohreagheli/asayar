<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Message;
use App\Enums\AppointmentStatus;


class DashboardUser extends Component
{
    public $pageTitle = 'داشبورد';
    public $breadcrumbs = [
        [
            'title' => 'خانه',
            'url' => '/',
        ],
        [
            'title' => 'داشبورد کاربری',
            'url' => null,
        ],
    ];

    public function render()
    {
        $user = Auth::user();

        $appointmentsCount = Appointment::where(
            'user_id',
            $user->id
        )->count();

        $activeAppointments = Appointment::where(
            'user_id',
            $user->id
        )
        ->whereIn('status', [
            AppointmentStatus::Pending,
            AppointmentStatus::Assigned,
            AppointmentStatus::Accepted,
            AppointmentStatus::InProgress,
        ])
        ->count();

        $messagesCount = Message::where(
            'user_id',
            $user->id
        )->count();

        $membershipDays = $user->created_at
            ? $user->created_at->diffInDays(now())
            : 0;

        $latestAppointments = Appointment::where(
            'user_id',
            $user->id
        )
        ->latest()
        ->take(5)
        ->get();

        return view(
            'livewire.dashboard-user',
            compact(
                'appointmentsCount',
                'activeAppointments',
                'messagesCount',
                'membershipDays',
                'latestAppointments'
            )
            )->layout('layouts.lay', [
    'pageTitle' => $this->pageTitle,
    'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}
