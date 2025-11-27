<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

#[Layout('layouts.auth')]
class LoginForm extends Component
{
    public $email;
    public $mobile;
    public $password;
    public $remember = false;

    // OTP برای موبایل (اختیاری)
    public $otp;
    public $generatedOtp;
    public $otpStep = false;

    public function mount()
    {
        if (Auth::check()) {
            return $this->redirectAfterLogin();
        }
    }

    public function login()
    {
        // اگر ایمیل وارد شده باشد ورود با ایمیل
        if (!empty($this->email)) {
            $this->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ], [
                'email.required' => 'ایمیل الزامی است',
                'email.email' => 'ایمیل معتبر وارد کنید',
                'password.required' => 'رمز عبور الزامی است',
                'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد',
            ]);

            $user = User::where('email', $this->email)->first();

            if (!$user) {
                $this->addError('email', 'کاربری با این ایمیل یافت نشد');
                return;
            }

            if (!Hash::check($this->password, $user->password)) {
                $this->addError('password', 'رمز عبور اشتباه است');
                return;
            }

            Auth::login($user, $this->remember);

            return $this->redirectAfterLogin();
        }

        // اگر موبایل وارد شده باشد ورود با موبایل
        if (!empty($this->mobile)) {

            $this->validate([
                'mobile' => 'required|digits:10',
                'password' => 'required|min:8',
            ], [
                'mobile.required' => 'شماره موبایل الزامی است',
                'mobile.digits' => 'شماره موبایل باید دقیقاً ۱۰ رقم باشد',
                'password.required' => 'رمز عبور الزامی است',
                'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد',
            ]);

            if (str_starts_with($this->mobile, '0')) {
                $this->addError('mobile', 'شماره موبایل را بدون صفر ابتدای شماره وارد کنید.');
                return;
            }

            $mobileWithCode = '+98' . $this->mobile;
            $user = User::where('mobile', $mobileWithCode)->first();

            if (!$user) {
                $this->addError('mobile', 'کاربری با این شماره موبایل ثبت نشده');
                return;
            }

            // چک رمز عبور
            if (!Hash::check($this->password, $user->password)) {
                $this->addError('password', 'رمز عبور اشتباه است');
                return;
            }

            Auth::login($user, $this->remember);

            return $this->redirectAfterLogin();
        }

        // اگر هیچکدام وارد نشده بود
        $this->addError('email', 'ایمیل یا شماره موبایل الزامی است');
        $this->addError('mobile', 'ایمیل یا شماره موبایل الزامی است');
    }

    private function redirectAfterLogin()
    {
        Session::regenerate();
        $user = Auth::user();

        if ($user->role === 'admin') {
            return $this->redirect(route('admin.dashboard'), navigate: true);
        }

        return $this->redirect(route('dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
