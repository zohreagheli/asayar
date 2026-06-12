<div>

    <!-- لوگو -->
    <div class="col col-login mx-auto mt-5 text-center">
        <img
            src="{{ asset('assets/image/logo-206.png') }}"
            class="header-brand-img"
            alt="لوگو">
    </div>

    <div class="container-login100">

        <div class="wrap-login100 p-4">

            <!-- هدر -->
            <div class="text-center mb-4">

                <h3 class="fw-bold text-primary mb-2">
                    ورود با کد یکبار مصرف
                </h3>

                <div class="header-underline mx-auto"></div>

                <p class="text-muted mt-3 mb-0">

                    @if(!$otpSent)
                        شماره موبایل خود را وارد کنید
                    @else
                        کد تایید ارسال شده را وارد کنید
                    @endif

                </p>

            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="{{ $otpSent ? 'verifyOtp' : 'sendOtp' }}">

                @if(!$otpSent)

                    <!-- موبایل -->
                    <div class="mb-4">

                        <div class="input-group">

                           

                            <div class="input-group">

                                <span class="input-group-text">
                                    +98
                                </span>

                                <input
                                    type="text"
                                    wire:model="mobile"
                                    maxlength="10"
                                    class="form-control text-start @error('mobile') is-invalid @enderror"
                                    placeholder="9123456789">

                            </div>

                        </div>

                        @error('mobile')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="d-grid">

                        <button
                            type="submit"
                            class="btn btn-primary">

                            ارسال کد تایید

                        </button>

                    </div>

                @else

                    <!-- کد تایید -->
                    <div class="mb-4">

                        <div class="input-group">

                            <span class="label-inside">
                                کد تایید
                            </span>

                            <input
                                type="text"
                                wire:model="otp"
                                maxlength="4"
                                class="form-control text-center @error('otp') is-invalid @enderror"
                                placeholder="1234">

                        </div>

                        @error('otp')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="d-grid">

                        <button
                            type="submit"
                            class="btn btn-success">

                            ورود به حساب کاربری

                        </button>

                    </div>

                @endif

            </form>

        </div>

    </div>

</div>
