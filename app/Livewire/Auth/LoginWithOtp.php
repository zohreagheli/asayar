<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\OtpService;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.auth')]
class LoginWithOtp extends Component
{
    public $mobile; // بدون +98 و بدون صفر: مثال 9123456789
    public $otp;
    public $otpSent = false;

    protected $otpTtl = 300;       // 5 دقیقه اعتبار OTP
    protected $rateLimitTtl = 60;  // فاصله بین ارسال‌ها 60 ثانیه

    /**
     * ارسال OTP
     */
    public function sendOtp()
    {
        $this->resetValidation();

        $this->validate([
            'mobile' => ['required','regex:/^[1-9][0-9]{9}$/'],
        ], [
            'mobile.required' => 'شماره موبایل الزامی است',
            'mobile.regex' => 'شماره موبایل باید ۱۰ رقم و بدون صفر ابتدای شماره وارد شود.',
        ]);

        if (Str::startsWith($this->mobile, '0')) {
            $this->addError('mobile', 'شماره موبایل را بدون صفر وارد کنید.');
            return;
        }

        $fullMobile = '+98' . $this->mobile;

        // Rate Limit
        $rateKey = "otp-rate:{$fullMobile}";
        if (Cache::has($rateKey)) {
            $this->addError('mobile', 'لطفاً چند ثانیه صبر کنید و دوباره تلاش کنید.');
            return;
        }

        // بررسی وجود کاربر
        $user = User::where('mobile', $fullMobile)->first();
        if (!$user) {
            $this->addError('mobile', 'کاربری با این شماره وجود ندارد.');
            return;
        }

        // ارسال OTP
        $result = OtpService::sendOtp($fullMobile, [
            'use_template' => false,
            'length' => 4,
            'ttl' => $this->otpTtl
        ]);

        if (!$result['ok']) {
            $this->addError('mobile', $result['message']);
            return;
        }

        // ثبت Rate Limit
        Cache::put($rateKey, true, $this->rateLimitTtl);

        $this->otpSent = true;
        session()->flash('success', 'کد به شماره موبایل شما ارسال شد.');
    }

    /**
     * تایید OTP و ورود کاربر
     */
    public function verifyOtp()
    {
        $this->resetValidation();

        $this->validate([
            'otp' => ['required','digits:4'],
        ], [
            'otp.required' => 'کد الزامی است',
            'otp.digits' => 'کد باید ۴ رقمی باشد',
        ]);

        $fullMobile = '+98' . $this->mobile;

        if (!OtpService::verifyOtp($fullMobile, $this->otp)) {
            $this->addError('otp', 'کد وارد شده صحیح نیست یا منقضی شده است.');
            return;
        }

        // ورود کاربر
        $user = User::where('mobile', $fullMobile)->first();
        if ($user) {
            Auth::login($user);
            session()->flash('success', 'ورود موفقیت‌آمیز بود.');
            return redirect()->intended('/');
        }

        $this->addError('mobile', 'کاربر پیدا نشد.');
    }

    public function render()
    {
        return view('livewire.auth.login-with-otp');
    }
}
