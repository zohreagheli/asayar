<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class Showtikets extends Component
{
 public Ticket $ticket;
    public $adminReply;

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->adminReply = $ticket->admin_reply;
    }

    public function saveReply()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'دسترسی غیرمجاز.');
        }

        $this->ticket->admin_reply = $this->adminReply;
        $this->ticket->save();

        session()->flash('success', 'پاسخ با موفقیت ثبت شد.');
    }

    public function render()
    {
        $layout = (Auth::check() && Auth::user()->role === 'admin')
            ? 'layouts.admin'
            : 'layouts.lay';

        return view('livewire.admin.showtikets') ->layout($layout);
    }
}
