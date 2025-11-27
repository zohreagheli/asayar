<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.auth')]
class AdminLoginForm extends Component
{

    public $username;
    public $password;

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'نام کاربری الزامی است',
            'password.required' => 'رمز عبور الزامی است',
            'password.min'      => 'رمز عبور باید حداقل ۶ کاراکتر باشد',
        ]);

        $user = User::where('username', $this->username)->first();

        if (!$user) {
            $this->addError('username', 'کاربری با این نام کاربری وجود ندارد.');
            return;
        }

        // نقش‌های مجاز
        if (!in_array($user->role, ['admin', 'manager', 'editor'])) {
            $this->addError('username', 'شما دسترسی ورود به پنل مدیریت را ندارید.');
            return;
        }

        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'رمز عبور اشتباه است.');
            return;
        }

        Auth::login($user);
        Session::regenerate();

        return $this->redirect(route('admin.dashboard'), navigate: true);
    }
    public function render()
    {
        return view('livewire.auth.admin-login-form');
    }
}
