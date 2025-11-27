<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.main')]
class About extends Component
{
    public function render()
    {
        return view('livewire.company.about');
    }
}
