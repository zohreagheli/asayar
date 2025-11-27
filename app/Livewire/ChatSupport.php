<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('layouts.main')]
class ChatSupport extends Component
{
    public $messageText;
    public $chatMessages;
    public $userIdentifier;

    protected $rules = [
        'messageText' => 'required|string|max:500',
    ];

    protected $messages = [
    'messageText.required' => 'پیام نمی‌تواند خالی باشد',
];

    public function mount()
    {
        $this->userIdentifier = Auth::check() ? Auth::id() : session()->getId();
        $this->loadMessages();
    }

    public function loadMessages()
    {
        if (Auth::check()) {
            $this->chatMessages = Message::where('user_id', Auth::id())
                ->orWhere('guest_id', session()->getId())
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $this->chatMessages = Message::where('guest_id', session()->getId())
                ->orderBy('created_at', 'asc')
                ->get();
        }
    }

    public function sendMessage()
    {
        $this->validate();

        Message::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'guest_id' => Auth::check() ? null : session()->getId(),
            'message' => $this->messageText,
            'is_admin' => false,
        ]);

        $this->reset('messageText');
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat-support');
    }
}
