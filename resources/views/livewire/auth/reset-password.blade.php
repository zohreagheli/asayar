<div>
    <!-- BACKGROUND-IMAGE -->
    <div class="">
        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{ asset('assets/image/logo-206.png')}}"
                             class="header-brand-img m-0"
                             alt="لوگو">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">

                        {{-- پیام موفقیت --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- فرم بازنشانی رمز عبور --}}
                        <form class="login100-form" wire:submit.prevent="resetPassword">
                            <span class="login100-form-title pb-5">
                                بازنشانی رمز عبور
                            </span>
                            <p class="text-muted">رمز عبور جدید خود را وارد کنید</p>

                            {{-- ایمیل --}}
                            <div class="wrap-input100 input-group mt-3">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control text-end"
                                       type="email"
                                       placeholder="ایمیل"
                                       wire:model.defer="email">
                            </div>
                            @error('email')
                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                            @enderror

                            {{-- رمز عبور جدید --}}
                            <div class="wrap-input100 input-group mt-3">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control text-end"
                                       type="password"
                                       placeholder="رمز عبور جدید"
                                       wire:model.defer="password">
                            </div>
                            @error('password')
                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                            @enderror

                            {{-- تکرار رمز عبور --}}
                            <div class="wrap-input100 input-group mt-3">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-lock-outline" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control text-end"
                                       type="password"
                                       placeholder="تکرار رمز عبور"
                                       wire:model.defer="password_confirmation">
                            </div>

                            <div class="submit mt-3">
                                <button type="submit" class="btn btn-primary d-grid">تغییر رمز عبور</button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="text-dark mb-0">
                                    بازگشت به
                                    <a class="text-primary ms-1" href="{{ route('login') }}">صفحه ورود</a>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- CONTAINER CLOSED -->

            </div>
        </div>
        <!-- END PAGE -->
    </div>
</div>

