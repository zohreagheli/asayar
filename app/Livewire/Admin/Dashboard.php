<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\layout;
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard')
        ->layout('layouts.admin');
    }
}
