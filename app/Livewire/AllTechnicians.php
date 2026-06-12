<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Technician;
use Livewire\Attributes\Layout;

class AllTechnicians extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $pageTitle = 'سرویسکاران';

    public $breadcrumbs = [
        [
            'title' => 'خانه',
            'url' => '/',
        ],
        [
            'title' => 'سرویسکاران',
            'url' => null,
        ],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = trim($this->search);

        $technicians = Technician::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('expertise', 'like', "%{$search}%");
                });
            })
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.all-technicians', [
            'technicians' => $technicians,
        ])->layout('layouts.main', [
            'pageTitle' => $this->pageTitle,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}
