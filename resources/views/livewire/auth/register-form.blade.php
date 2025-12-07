<div>

    <div class="col col-login mx-auto mt-7 text-center">
        <img src="{{ asset('assets/image/logo-206.png') }}" class="header-brand-img m-0" alt="لوگو">


        <div class="container-login100">
            <div class="wrap-login100 p-6">
                <form wire:submit.prevent="register" class="login100-form validate-form" novalidate>
                    <span class="login100-form-title mb-4">ثبت نام</span>

                    <!-- نام کامل -->
                    <div class="wrap-input100 validate-input input-group mb-3">
                        <a class="input-group-text bg-white text-muted">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <input wire:model="name" class="input100 border-start-0 ms-0 text-end form-control"
                            type="text" placeholder="نام کامل" autofocus>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- ایمیل -->
                    <div class="wrap-input100 validate-input input-group mb-3">
                        <a class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-email"></i>
                        </a>
                        <input wire:model="email" class="input100 border-start-0 ms-0 text-end form-control"
                            type="email" placeholder="ایمیل (اختیاری)">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- موبایل -->
                    <div class="wrap-input100 validate-input input-group mb-2">
                        <span class="input-group-text bg-white text-muted">+98</span>
                        <input wire:model="mobile" class="form-control text-end" type="text"
                            placeholder="شماره موبایل (بدون صفر) — مثال: 9123456789" maxlength="10"
                            pattern="[1-9][0-9]{9}">
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <small class="text-muted d-block mb-3">
                        شماره موبایل الزامی است — ایمیل اختیاری.
                    </small>
                    <!-- پسورد -->
                    <div class="wrap-input100 validate-input input-group mb-3" id="Password-toggle">
                        <a class="input-group-text bg-white text-muted toggle-password" href="javascript:void(0)">
                            <i class="zmdi zmdi-eye"></i>
                        </a>
                        <input id="password" wire:model="password"
                            class="input100 border-start-0 ms-0 text-end form-control" type="password"
                            placeholder="کلمه عبور" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- تکرار پسورد -->
                    <div class="wrap-input100 validate-input input-group mb-4">
                        <a class="input-group-text bg-white text-muted toggle-password" href="javascript:void(0)">
                            <i class="zmdi zmdi-eye"></i>
                        </a>
                        <input id="password_confirmation" wire:model="password_confirmation"
                            class="input100 border-start-0 ms-0 text-end form-control" type="password"
                            placeholder="تکرار کلمه عبور" required>
                    </div>

                    <div class="container-login100-form-btn mt-3">
                        <button type="submit" class="login100-form-btn btn-primary">ثبت نام</button>
                    </div>

                    <div class="text-center pt-3">
                        <p class="text-dark mb-0">
                            از قبل عضو هستید؟
                            <a href="{{ route('login') }}" class="text-primary ms-1" wire:navigate>ورود به سیستم</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const input = this.nextElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                this.querySelector('i').classList.remove('zmdi-eye');
                this.querySelector('i').classList.add('zmdi-eye-off');
            } else {
                input.type = 'password';
                this.querySelector('i').classList.remove('zmdi-eye-off');
                this.querySelector('i').classList.add('zmdi-eye');
            }
        });
    });
</script>
