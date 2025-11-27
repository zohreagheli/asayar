<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

#[Layout('layouts.auth')]
class RegisterForm extends Component
{
    // nullable بودن برای جلوگیری از خطا
    public ?string $name = '';
    public ?string $email = '';
    public ?string $mobile = '';
    public ?string $password = '';
    public ?string $password_confirmation = '';

    public function register(): void
    {
        // پاک کردن فاصله‌ها
        $this->email = trim($this->email ?? '');
        $this->mobile = trim($this->mobile ?? '');

        // تبدیل ایمیل خالی "" → null
        if ($this->email === '') {
            $this->email = null;
        }

        // حذف هرچیزی غیر از رقم
        $this->mobile = preg_replace('/\D/', '', $this->mobile ?? '');

        // تبدیل موبایل خالی "" → null
        if ($this->mobile === '' || $this->mobile === null) {
            $this->mobile = null;
        }

        // اعتبارسنجی
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],

            // ۱۰ رقم، بدون صفر
            'mobile' => ['nullable', 'regex:/^[1-9][0-9]{9}$/'],

            'password' => ['required', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required'       => 'وارد کردن نام الزامی است.',
            'name.max'            => 'نام نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'email.email'         => 'ایمیل معتبر وارد کنید.',
            'email.max'           => 'ایمیل نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'mobile.regex'        => 'شماره موبایل باید ۱۰ رقم باشد و بدون صفر ابتدای شماره وارد شود (مثال: 9123456789).',

            'password.required'   => 'رمز عبور الزامی است.',
            'password.min'        => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed'  => 'رمز عبور با تأییدیه مطابقت ندارد.',
        ]);

        // حداقل یکی از ایمیل یا موبایل باید پر باشد
        if (empty($this->email) && empty($this->mobile)) {
            throw ValidationException::withMessages([
                'email'  => ['حداقل باید ایمیل یا شماره موبایل وارد شود.'],
                'mobile' => ['حداقل باید ایمیل یا شماره موبایل وارد شود.'],
            ]);
        }

        // ایمیل یونیک
        if (!empty($validated['email']) && User::where('email', $validated['email'])->exists()) {
            throw ValidationException::withMessages([
                'email' => ['این ایمیل قبلاً ثبت شده است.'],
            ]);
        }

        // موبایل یونیک — تبدیل به +98
        if (!empty($validated['mobile'])) {
            $fullMobile = '+98' . $validated['mobile'];

            if (User::where('mobile', $fullMobile)->exists()) {
                throw ValidationException::withMessages([
                    'mobile' => ['این شماره موبایل قبلاً ثبت شده است.'],
                ]);
            }

            $validated['mobile'] = $fullMobile;
        } else {
            $validated['mobile'] = null;
        }

        // هش کردن پسورد
        $validated['password'] = Hash::make($validated['password']);

        // ساخت کاربر
        event(new Registered($user = User::create($validated)));

        // ورود خودکار
        Auth::login($user);

        // ریدایرکت
        $this->redirect(route('admin.panel', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
