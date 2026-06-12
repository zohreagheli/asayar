<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;

#[Layout('layouts.auth')]
class LoginWithOtp extends Component
{
    public $mobile;
    public $otp;
    public $otpSent = false;

    protected $rateLimitTtl = 60;

    public function sendOtp()
    {
        $this->resetValidation();

        $this->validate([
            'mobile' => ['required', 'regex:/^[1-9][0-9]{9}$/'],
        ], [
            'mobile.required' => 'شماره موبایل الزامی است',
            'mobile.regex' => 'شماره موبایل باید ۱۰ رقم و بدون صفر ابتدای شماره وارد شود',
        ]);

        $fullMobile = '+98' . $this->mobile;

        $rateKey = "otp-rate:{$fullMobile}";

        if (Cache::has($rateKey)) {
            $this->addError(
                'mobile',
                'لطفاً چند ثانیه صبر کنید و دوباره تلاش کنید.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | محیط لوکال
        |--------------------------------------------------------------------------
        */
        if (app()->environment('local')) {

            Cache::put(
                "otp-code:{$fullMobile}",
                '1234',
                now()->addMinutes(5)
            );

            session()->flash(
                'success',
                'محیط تست: کد ورود 1234 می‌باشد'
            );
        } else {

            $result = \App\Services\OtpService::sendOtp(
                $fullMobile,
                [
                    'use_template' => false,
                    'length' => 4,
                    'ttl' => 300
                ]
            );

            if (!$result['ok']) {
                $this->addError('mobile', $result['message']);
                return;
            }

            session()->flash(
                'success',
                'کد تایید ارسال شد'
            );
        }

        Cache::put(
            $rateKey,
            true,
            now()->addSeconds($this->rateLimitTtl)
        );

        $this->otpSent = true;
    }

    public function verifyOtp()
    {
        $this->resetValidation();

        $this->validate([
            'otp' => ['required', 'digits:4'],
        ], [
            'otp.required' => 'کد تایید الزامی است',
            'otp.digits' => 'کد باید ۴ رقمی باشد',
        ]);

        $fullMobile = '+98' . $this->mobile;

        /*
        |--------------------------------------------------------------------------
        | محیط لوکال
        |--------------------------------------------------------------------------
        */
        if (app()->environment('local')) {

            $cachedOtp = Cache::get("otp-code:{$fullMobile}");

            if ($cachedOtp !== $this->otp) {
                $this->addError(
                    'otp',
                    'کد وارد شده صحیح نیست'
                );

                return;
            }

        } else {

            if (!\App\Services\OtpService::verifyOtp(
                $fullMobile,
                $this->otp
            )) {
                $this->addError(
                    'otp',
                    'کد وارد شده صحیح نیست یا منقضی شده است'
                );

                return;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | ساخت خودکار کاربر
        |--------------------------------------------------------------------------
        */
        $user = User::firstOrCreate(
            [
                'mobile' => $fullMobile
            ],
            [
                'name' => 'کاربر ' . substr($this->mobile, -4),
                'role' => 'user',
            ]
        );

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login-with-otp');
    }
}
