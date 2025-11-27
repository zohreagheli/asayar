<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

#[Layout('layouts.auth')]
class ResetPassword extends Component
{
    public string $email = '';
    public string $token = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount($token = null)
{
    $this->token = $token;
    $this->email = request()->query('email', '');
}


    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.required' => 'وارد کردن ایمیل الزامی است',
            'email.email' => 'ایمیل معتبر وارد کنید',
            'password.required' => 'رمز عبور جدید الزامی است',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد',
            'password.confirmed' => 'رمز عبور و تکرار آن مطابقت ندارند',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET || $status === 'passwords.reset') {
            session()->flash('status', 'رمز عبور شما با موفقیت تغییر یافت. اکنون می‌توانید وارد شوید');
            return redirect()->route('login');
        } else {
            $this->addError('email', 'توکن یا ایمیل نامعتبر است. لطفاً دوباره تلاش کنید');
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
