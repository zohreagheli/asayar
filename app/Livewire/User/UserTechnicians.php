<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Technician;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
#[Layout('layouts.lay')]
class UserTechnicians extends Component
{
   use WithPagination;

    public $search = ''; // برای جستجوی سرویسکاران
    protected $paginationTheme = 'bootstrap'; // اگر از Bootstrap استفاده می‌کنید

    // برای رفرش صفحه وقتی جستجو تغییر می‌کند
    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
{
    $userId = Auth::id();

    $technicians = Technician::whereHas('appointments', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })
    ->where(function($query) {
        $query->where('name', 'like', '%'.$this->search.'%')
              ->orWhere('expertise', 'like', '%'.$this->search.'%');
    })
    ->orderBy('name')
    ->paginate(6);

    // اینجا متغیر را به ویو پاس می‌دهیم
    return view('livewire.user.user-technicians', [
        'technicians' => $technicians
    ]);
}

}
