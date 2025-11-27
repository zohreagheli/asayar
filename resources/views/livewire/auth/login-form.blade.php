<div>
    <div class="col col-login mx-auto mt-7 text-center">
        <img src="{{ asset('assets/image/logo-206.png') }}" class="header-brand-img" alt="لوگو">
    </div>

    <div class="container-login100">
        <div class="wrap-login100 p-6">
            <form wire:submit.prevent="login" class="login100-form validate-form" novalidate>
                <span class="login100-form-title pb-4">ورود</span>

                <!-- ایمیل -->
                <div class="wrap-input100 input-group mb-1">
                    <span class="input-group-text bg-white text-muted"><i class="zmdi zmdi-email"></i></span>
                    <input wire:model="email" class="form-control text-end" type="email" placeholder="ایمیل"
                        autocomplete="username">
                </div>
                @error('email')
                    <span class="text-danger d-block mb-2">{{ $message }}</span>
                @enderror

                <!-- موبایل -->
                <div class="wrap-input100 input-group mb-1">
                    <span class="input-group-text bg-white text-muted">+98</span>
                    <input wire:model="mobile" class="form-control text-end" maxlength="10"
                        placeholder="شماره موبایل 9123456789" autocomplete="tel">
                </div>
                @error('mobile')
                    <span class="text-danger d-block mb-2">{{ $message }}</span>
                @enderror

                <!-- پسورد -->
                <div class="wrap-input100 input-group mb-1 ">
                    <span class="input-group-text bg-white text-muted" style="cursor:pointer;"
                        onclick="togglePassword()"><i class="zmdi zmdi-eye"></i></span>
                    <input wire:model="password" id="passwordInput" class="form-control text-end" type="password"
                        placeholder="کلمه عبور">
                </div>
                @error('password')
                    <span class="text-danger d-block mb-2">{{ $message }}</span>
                @enderror

                <div class="text-end mt-1 mb-2">
                    <a href="{{ route('password.request') }}" class="text-primary" style="font-size: 14px;">
                        فراموشی رمز عبور؟
                    </a>
                </div>
                <div class="container-login100-form-btn mt-3">
                    <button type="submit" class="login100-form-btn btn-primary">ورود</button>
                </div>

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
<script>
    function togglePassword() {
        const input = document.getElementById('passwordInput');
        input.type = input.type === "password" ? "text" : "password";
    }
</script>
