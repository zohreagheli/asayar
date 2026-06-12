<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GalleryImage;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $pageTitle = 'گالری تصاویر';

    public $breadcrumbs = [
        [
            'title' => 'خانه',
            'url' => '/',
        ],
        [
            'title' => 'گالری تصاویر',
            'url' => null,
        ],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $images = GalleryImage::query()
            ->when($this->search, function ($query) {
                $query->where(
                    'title',
                    'like',
                    '%' . $this->search . '%'
                );
            })
            ->latest()
            ->paginate(10);

        return view(
            'livewire.gallery.index',
            compact('images')
        )->layout(
            'layouts.main',
            [
                'pageTitle' => $this->pageTitle,
                'breadcrumbs' => $this->breadcrumbs,
            ]
        );
    }
}
