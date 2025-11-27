<div>
    <div class="col col-login mx-auto mt-7 text-center">
        <img src="{{ asset('assets/image/logo-206.png') }}" class="header-brand-img" alt="لوگو">
    </div>

    <div class="container-login100">
        <div class="wrap-login100 p-6">
            <form wire:submit.prevent="login" class="login100-form validate-form" novalidate>
                <span class="login100-form-title pb-4">ورود ادمین</span>

                <!-- یوزرنیم -->
                <div class="wrap-input100 input-group mb-1">
                    <span class="input-group-text bg-white text-muted"><i class="zmdi zmdi-account"></i></span>
                    <input wire:model="username" class="form-control text-end" type="text" placeholder="نام کاربری">
                </div>
                @error('username')
                    <span class="text-danger d-block mb-2">{{ $message }}</span>
                @enderror

                <!-- پسورد -->
                <div class="wrap-input100 input-group mb-1 ">
                    <span class="input-group-text bg-white text-muted" onclick="togglePassword()" style="cursor:pointer;">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input wire:model="password" id="passwordInput" class="form-control text-end" type="password" placeholder="کلمه عبور">
                </div>
                @error('password')
                    <span class="text-danger d-block mb-2">{{ $message }}</span>
                @enderror

                <div class="container-login100-form-btn mt-3">
                    <button type="submit" class="login100-form-btn btn-primary">ورود به پنل ادمین</button>
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
