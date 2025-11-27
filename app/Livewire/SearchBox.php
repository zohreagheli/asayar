<?php

namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Route;
class SearchBox extends Component
{

    public $search = '';

    protected $queryString = ['search' => ['except' => '']];

    public function updatedSearch($value)
    {
        // استفاده از redirect به جای تغییر مسیر مستقیم
        
        $this->dispatch('search-updated', searchValue: $value);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
