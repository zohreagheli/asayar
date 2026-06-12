<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;


class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public $pageTitle = 'تماس با ما';

    public $breadcrumbs = [
        [
            'title' => 'خانه',
            'url' => '/',
        ],
        [
            'title' => 'تماس با ما',
            'url' => null,
        ],
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    protected $messages = [
        'name.required' => 'لطفاً نام خود را وارد کنید.',
        'email.required' => 'وارد کردن ایمیل الزامی است.',
        'email.email' => 'ایمیل وارد شده معتبر نیست.',
        'subject.required' => 'موضوع پیام الزامی است.',
        'message.required' => 'متن پیام الزامی است.',
    ];

    public function send()
    {
        $this->validate();

        Mail::raw($this->message, function ($mail) {

            $mail->to('raharajabi2@gmail.com')
                ->subject($this->subject)
                ->from('raharajabi2@gmail.com', 'Asayar Project')
                ->replyTo($this->email, $this->name);
        });

        $this->reset([
            'name',
            'email',
            'subject',
            'message'
        ]);

        $this->dispatch(
            'show-toast',
            message: 'پیام شما با موفقیت ارسال شد',
            type: 'success'
        );
    }

    public function render()
    {
        return view('livewire.contact')
            ->layout(
                'layouts.main',
                [
                    'pageTitle' => $this->pageTitle,
                    'breadcrumbs' => $this->breadcrumbs,
                ]
            );
    }
}
