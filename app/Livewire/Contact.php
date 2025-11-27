<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
#[Layout('layouts.main')]
class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];
     protected $messages = [
        'name.required' => 'لطفاً نام خود را وارد کنید.',
        'name.string' => 'نام باید به صورت متن باشد.',
        'name.max' => 'نام نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

        'email.required' => 'وارد کردن ایمیل الزامی است.',
        'email.email' => 'لطفاً یک ایمیل معتبر وارد کنید.',
        'email.max' => 'ایمیل نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

        'subject.required' => 'موضوع پیام الزامی است.',
        'subject.string' => 'موضوع باید به صورت متن باشد.',
        'subject.max' => 'موضوع نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

        'message.required' => 'متن پیام الزامی است.',
        'message.string' => 'متن پیام باید به صورت رشته‌ای از حروف باشد.',
    ];

    public function send()
    {
        $this->validate();

        Mail::raw($this->message, function ($mail) {
        $mail->to('raharajabi2@gmail.com')  // ایمیل شما برای دریافت
         ->subject($this->subject)
         ->from('raharajabi2@gmail.com', 'asayar project') // همان ایمیل شما
         ->replyTo($this->email, $this->name); // ایمیل کاربر به عنوان reply-to
});


        session()->flash('success', 'پیام شما با موفقیت ارسال شد.');
        $this->reset(['name', 'email', 'subject', 'message']);
    }
    public function render()
    {
        return view('livewire.contact');
    }
}
