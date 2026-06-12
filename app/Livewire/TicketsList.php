<?php

namespace App\Livewire;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $pageTitle = 'لیست تیکت‌ها';

    public $breadcrumbs = [
        [
            'title' => 'داشبورد',
            'url' => '/dashboard'
        ],
        [
            'title' => 'لیست تیکت‌ها',
            'url' => null
        ]
    ];

    protected $listeners = [
        'ticketCreated' => '$refresh',
        'search-updated' => 'updateSearch'
    ];

    public function updateSearch($searchValue)
    {
        $this->search = $searchValue;
        $this->resetPage();
    }

    public function render()
    {
        $layout = (Auth::check() && Auth::user()->role === 'admin')
            ? 'layouts.admin'
            : 'layouts.lay';

        $query = Ticket::query();

        if (!(Auth::check() && Auth::user()->role === 'admin')) {
            $query->where('user_id', auth()->id());
        }

        $tickets = $query
            ->when($this->search, function ($q) {
                $q->where(function ($q2) {
                    $q2->where('title', 'like', '%' . $this->search . '%')
                       ->orWhere('category', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.tickets-list', [
            'tickets' => $tickets
        ])->layout($layout, [
            'pageTitle' => $this->pageTitle,
            'breadcrumbs' => $this->breadcrumbs
        ]);
    }
}
