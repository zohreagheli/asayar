<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class ForgetPassword extends Component
{
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        // اعتبارسنجی ورودی با پیام‌های فارسی
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ], [
            'email.required' => 'وارد کردن ایمیل الزامی است',
            'email.email' => 'لطفا یک ایمیل معتبر وارد کنید',
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', 'ایمیل وارد شده یافت نشد');
            return;
        }

        $this->reset('email');
        session()->flash('status', 'لینک بازنشانی رمز عبور به ایمیل شما ارسال شد');
    }

    public function render()
    {
        return view('livewire.auth.forget-password');
    }
}
