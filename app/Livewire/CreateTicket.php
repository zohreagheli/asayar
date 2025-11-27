<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Ticket;
use Livewire\WithFileUploads;

use App\Models\User;

#[Layout('layouts.lay')]
class CreateTicket extends Component
{
    use WithFileUploads;
    public $title;
    public $category;
    public $priority = 'medium'; // مقدار پیش‌فرض
    public $description;
    public $attachment; // برای ذخیره فایل آپلود شده
    protected $messages = [
        'title.required' => 'پر کردن عنوان الزامی است',
        'title.min' => 'عنوان باید حداقل ۵ کاراکتر باشد',
        'category.required' => 'انتخاب گروه الزامی است',
        'priority.required' => 'انتخاب اولویت الزامی است',
        'priority.in' => 'مقدار اولویت نامعتبر است',
        'description.required' => 'پر کردن توضیحات الزامی است',
        'description.min' => 'توضیحات باید حداقل ۱۰ کاراکتر باشد',
        'attachment.max' => 'حجم فایل نباید بیشتر از 5 مگابایت باشد',
        'attachment.mimes' => 'فرمت فایل مجاز نیست (فقط: pdf, jpg, png)'
    ];
    public function submitTicket()
    {
        $this->validate([
            'title' => 'required|min:5',
            'category' => 'required',
            'priority' => 'required|in:low,medium,high',
            'description' => 'required|min:10',
            'attachment' => 'nullable|file|max:5120|mimes:pdf,jpg,png' // حداکثر 5MB
        ]);


        $ticketData = [
            'title' => $this->title,
            'category' => $this->category,
            'priority' => $this->priority,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ];

        // اگر فایل ضمیمه شده باشد
        if ($this->attachment) {
            $path = $this->attachment->store('tickets/attachments', 'public');
            $ticketData['attachment_path'] = $path;
        }
        try {
            $ticket = Ticket::create($ticketData);
            $this->dispatch('ticket-created',
                ticketId: $ticket->id,
                title: $ticket->title,
                category: $ticket->category,
                priority: $ticket->priority,
                createdAt: $ticket->created_at->toDateTimeString()
            );
            $this->reset([
                'title',
                'category',
                'priority',
                'description',
                'attachment'
            ]);

            return redirect()
                ->route('tickets.list')
                ->with('success', 'تیکت با موفقیت ثبت شد!');
        } catch (\Exception $e) {
            $this->addError('save', 'خطا در ثبت تیکت: ' . $e->getMessage());
        }
    }
}
