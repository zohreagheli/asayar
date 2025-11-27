<?php

namespace App\Livewire;

use Livewire\Component;

class SidebarToggle extends Component
{
    public $collapsed = false;

    public function toggle()
    {
        $this->collapsed = !$this->collapsed;

    }

    public function render()
    {
        return view('livewire.sidebar-toggle', [
            'collapsed' => $this->collapsed
        ]);
    }
}
