<div>
    <div class="col col-login mx-auto mt-7 text-center">
        <img src="{{ asset('assets/image/logo-206.png') }}" class="header-brand-img" alt="لوگو">
    </div>

    <div class="container-login100">
        <div class="wrap-login100 p-6">
            <form wire:submit.prevent="{{ $otpSent ? 'verifyOtp' : 'sendOtp' }}" class="login100-form validate-form" novalidate>
                <span class="login100-form-title pb-4">
                    {{ $otpSent ? 'لطفا کد 4رقمی ارسال شده را وارد کنید' : 'لطفا شماره موبایل خودرا وارد کنید' }}
                </span>

                <!-- موبایل -->
                @if (!$otpSent)
                    <div class="wrap-input100 input-group mb-1">
                        <span class="input-group-text bg-white text-muted">+98</span>
                        <input wire:model="mobile" class="form-control text-end" maxlength="10"
                            placeholder="شماره موبایل 9123456789" autocomplete="tel">
                    </div>
                    @error('mobile')
                        <span class="text-danger d-block mb-2">{{ $message }}</span>
                    @enderror

                    <div class="container-login100-form-btn mt-3">
                        <button type="submit" class="login100-form-btn btn-primary">ارسال کد</button>
                    </div>
                @else
                    <!-- کد OTP -->
                    <div class="wrap-input100 input-group mb-1">
                        <span class="input-group-text bg-white text-muted"><i class="zmdi zmdi-lock"></i></span>
                        <input wire:model="otp" class="form-control text-end" maxlength="4"
                            placeholder="کد 4 رقمی" autocomplete="one-time-code">
                    </div>
                    @error('otp')
                        <span class="text-danger d-block mb-2">{{ $message }}</span>
                    @enderror

                    <div class="container-login100-form-btn mt-3">
                        <button type="submit" class="login100-form-btn btn-success">تایید و ورود</button>
                    </div>
                @endif

                <div class="text-center pt-3">
                    <p class="text-dark mb-0">
                        ثبت نام نکرده‌اید؟
                        <a href="{{ route('register') }}" class="text-primary ms-1" wire:navigate>ثبت نام</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
