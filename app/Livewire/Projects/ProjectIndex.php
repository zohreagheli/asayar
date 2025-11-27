<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class ProjectIndex extends Component
{
    public $projects;

public function mount()
{
    $this->projects = Project::withCount('tasks')->get();
}

    public function render()
    {
        return view('livewire.projects.project-index');
    }
}
