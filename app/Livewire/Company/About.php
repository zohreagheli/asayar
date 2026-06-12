<?php

namespace App\Livewire\Company;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.main')]
class About extends Component
{
    public $pageTitle = 'درباره ما';

    public $breadcrumbs = [
        [
            'title' => 'خانه',
            'url' => '/',
        ],
        [
            'title' => 'درباره ما',
            'url' => null,
        ],
    ];

    public function render()
    {
        return view('livewire.company.about')
            ->layout(
                'layouts.main',
                [
                    'pageTitle' => $this->pageTitle,
                    'breadcrumbs' => $this->breadcrumbs,
                ]
            );
    }
}
