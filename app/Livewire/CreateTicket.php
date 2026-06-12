<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Ticket;

#[Layout('layouts.lay')]
class CreateTicket extends Component
{
    use WithFileUploads;

    public $title;
    public $category;
    public $priority = 'medium';
    public $description;
    public $attachment;

    public $pageTitle = 'ثبت تیکت';

    public $breadcrumbs = [
        [
            'title' => 'داشبورد',
            'url' => '/dashboard'
        ],
        [
            'title' => 'ثبت تیکت',
            'url' => null
        ]
    ];

    protected $messages = [
        'title.required' => 'پر کردن عنوان الزامی است',
        'title.min' => 'عنوان باید حداقل ۵ کاراکتر باشد',

        'category.required' => 'انتخاب گروه الزامی است',

        'priority.required' => 'انتخاب اولویت الزامی است',
        'priority.in' => 'مقدار اولویت نامعتبر است',

        'description.required' => 'پر کردن توضیحات الزامی است',
        'description.min' => 'توضیحات باید حداقل ۱۰ کاراکتر باشد',

        'attachment.max' => 'حجم فایل نباید بیشتر از ۵ مگابایت باشد',
        'attachment.mimes' => 'فقط فایل‌های PDF، JPG و PNG مجاز هستند',
    ];

    public function submitTicket()
    {
        $this->validate([
            'title' => 'required|min:5',
            'category' => 'required',
            'priority' => 'required|in:low,medium,high',
            'description' => 'required|min:10',
            'attachment' => 'nullable|file|max:5120|mimes:pdf,jpg,png'
        ]);

        $data = [
            'title' => $this->title,
            'category' => $this->category,
            'priority' => $this->priority,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ];

        if ($this->attachment) {
            $data['attachment_path'] =
                $this->attachment->store(
                    'tickets/attachments',
                    'public'
                );
        }

        Ticket::create($data);

         $this->dispatch('show-toast',
        message: 'تیکت با موفقیت ثبت شد',
        type: 'success'
    );

        $this->reset([
            'title',
            'category',
            'priority',
            'description',
            'attachment'
        ]);

        $this->priority = 'medium';
    }

    public function render()
    {
        return view('livewire.create-ticket')
            ->layout('layouts.lay', [
                'pageTitle' => $this->pageTitle,
                'breadcrumbs' => $this->breadcrumbs,
            ]);
    }
}
