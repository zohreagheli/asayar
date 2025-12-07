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

    // اگر ایمیل خالی است → NULL
    if ($this->email === '') {
        $this->email = null;
    }

    // حذف هر چیز غیر از عدد
    $this->mobile = preg_replace('/\D/', '', $this->mobile ?? '');

    // تبدیل موبایل خالی → null
    if ($this->mobile === '' || $this->mobile === null) {
        $this->mobile = null;
    }

    // ✔ تغییرات اصلی اینجاست
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],

        'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],

        // 🔥 موبایل اکنون REQUIRED است
        'mobile' => ['required', 'regex:/^[1-9][0-9]{9}$/'],

        'password' => ['required', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],
    ], [
        'name.required'        => 'وارد کردن نام الزامی است.',
        'name.max'             => 'نام نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

        'email.email'          => 'ایمیل معتبر وارد کنید.',
        'email.max'            => 'ایمیل نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

        // 🔥 پیام جدید
        'mobile.required'      => 'وارد کردن شماره موبایل الزامی است.',
        'mobile.regex'         => 'شماره موبایل باید ۱۰ رقم و بدون صفر ابتدای آن باشد (مثال: 9123456789).',

        'password.required'    => 'رمز عبور الزامی است.',
        'password.min'         => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
        'password.confirmed'   => 'رمز عبور با تأییدیه مطابقت ندارد.',
    ]);

    // ایمیل یونیک
    if (!empty($validated['email']) && User::where('email', $validated['email'])->exists()) {
        throw ValidationException::withMessages([
            'email' => ['این ایمیل قبلاً ثبت شده است.'],
        ]);
    }

    // موبایل یونیک + ذخیره با +98
    $fullMobile = '+98' . $validated['mobile'];

    if (User::where('mobile', $fullMobile)->exists()) {
        throw ValidationException::withMessages([
            'mobile' => ['این شماره موبایل قبلاً ثبت شده است.'],
        ]);
    }

    $validated['mobile'] = $fullMobile;

    // هش کردن پسورد
    $validated['password'] = Hash::make($validated['password']);

    // ساخت کاربر
    event(new Registered($user = User::create($validated)));

    Auth::login($user);

    $this->redirect(route('home.page', absolute: false), navigate: true);
}


    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
