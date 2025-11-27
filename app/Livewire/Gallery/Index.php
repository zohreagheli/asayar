<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GalleryImage;
use Livewire\Attributes\Layout;

#[Layout('layouts.main')]
class Index extends Component
{
   use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // برای زیبایی با Bootstrap

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $images = GalleryImage::query()
            ->when($this->search, fn($q) =>
                $q->where('title', 'like', '%' . $this->search . '%')
            )
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('livewire.gallery.index', compact('images'));
    }
}
