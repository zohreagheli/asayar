<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Technician;
use Livewire\Attributes\Layout;

#[Layout('layouts.main')]
class AllTechnicians extends Component
{
    use WithPagination;

    public $search = ''; 
    protected $paginationTheme = 'bootstrap'; // اگر Bootstrap داری

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search; // حتماً قبل از closure تعریف شود
        $technicians = Technician::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('expertise', 'like', "%{$search}%");
                });
            })
            ->orderBy('name')
            ->paginate(12);

        return view('livewire.all-technicians', [
            'technicians' => $technicians
        ]);
    }
}
