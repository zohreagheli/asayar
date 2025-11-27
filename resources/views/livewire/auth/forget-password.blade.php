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

                        {{-- فرم فراموشی رمز --}}
                        <form class="login100-form" wire:submit.prevent="sendPasswordResetLink">
                            <span class="login100-form-title pb-5">
                                رمز عبور را فراموش کرده‌اید؟
                            </span>
                            <p class="text-muted">آدرس ایمیل ثبت شده در حساب خود را وارد کنید</p>

                            <div class="wrap-input100 input-group mt-3">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control text-end"
                                       type="text"
                                       placeholder="ایمیل"
                                       wire:model.defer="email">
                            </div>
                            @error('email')
                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                            @enderror

                            <div class="submit mt-3">
                                <button type="submit" class="login100-form-btn btn-primary">ارسال</button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="text-dark mb-0">
                                    به یاد آوردید؟
                                    <a class="text-primary ms-1" href="{{ route('login') }}">رفتن به صفحه ورود</a>
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
