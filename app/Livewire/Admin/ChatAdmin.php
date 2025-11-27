<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Message;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class ChatAdmin extends Component
{
    use WithPagination;

    public $selectedUser = null;    // شناسه کاربر انتخاب‌شده
    public $chatMessages = [];      // پیام‌های کاربر
    public $replyText = '';         // متن پاسخ ادمین

    protected $paginationTheme = 'bootstrap';

    // وقتی کاربر تغییر می‌کند، شماره صفحه جدول reset شود
    public function updatingSelectedUser()
    {
        $this->resetPage();
    }

    // انتخاب کاربر
    public function selectUser($user)
    {
        $this->selectedUser = $user;
        $this->loadMessagesForSelectedUser();
    }

    // بارگذاری پیام‌های کاربر انتخاب‌شده
    public function loadMessagesForSelectedUser()
    {
        if (!$this->selectedUser) {
            $this->chatMessages = [];
            return;
        }

        $query = Message::query();

        if (is_numeric($this->selectedUser)) {
            $query->where('user_id', $this->selectedUser);
        } else {
            $query->where('guest_id', $this->selectedUser);
        }

        $this->chatMessages = $query->orderBy('created_at')->get();
    }

    // ارسال پاسخ ادمین
    public function sendReply()
    {
        if (!$this->selectedUser || trim($this->replyText) === '') return;

        $message = new Message();
        $message->is_admin = true;

        if (is_numeric($this->selectedUser)) {
            $message->user_id = $this->selectedUser;
        } else {
            $message->guest_id = $this->selectedUser;
        }

        $message->message = $this->replyText;
        $message->save();

        $this->replyText = '';
        $this->loadMessagesForSelectedUser();
    }

    public function render()
    {
        // paginate جدول کاربران
        $userList = Message::selectRaw('COALESCE(user_id, guest_id) as identifier, MAX(created_at) as last_message_at')
            ->groupBy('identifier')
            ->orderByDesc('last_message_at')
            ->paginate(5);

        return view('livewire.admin.chat-admin', compact('userList'));
    }
}
