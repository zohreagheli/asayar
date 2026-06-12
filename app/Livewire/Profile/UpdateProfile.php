<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Models\User;

#[Layout('layouts.lay')]
class UpdateProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $mobile;

    public $avatar;
    public $currentAvatar;

    // تغییر رمز عبور
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public $pageTitle = 'ویرایش پروفایل';

    public $breadcrumbs = [
        [
            'title' => 'داشبورد',
            'url' => '/dashboard',
        ],
        [
            'title' => 'ویرایش پروفایل',
            'url' => null,
        ],
    ];

    public function mount()
    {
        /** @var User $user */
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;

        $this->mobile = $user->mobile
            ? substr($user->mobile, 3)
            : null;

        $this->currentAvatar = $user->avatar;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'mobile' => 'nullable|digits:10|unique:users,mobile,' . Auth::id(),
            'avatar' => 'nullable|image|max:2048',
        ], [
            'name.required' => 'نام الزامی است',
            'email.required' => 'ایمیل الزامی است',
            'email.email' => 'فرمت ایمیل صحیح نیست',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است',

            'mobile.digits' => 'شماره موبایل باید 10 رقم باشد',
            'mobile.unique' => 'این شماره موبایل قبلاً ثبت شده است',

            'avatar.image' => 'فایل انتخابی باید تصویر باشد',
            'avatar.max' => 'حجم تصویر نباید بیشتر از 2 مگابایت باشد',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->name = $this->name;
        $user->email = $this->email;

        $user->mobile = $this->mobile
            ? '+98' . ltrim($this->mobile, '0')
            : null;

        if ($this->avatar) {

            if (
                $user->avatar &&
                Storage::exists('public/avatars/' . $user->avatar)
            ) {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            $avatarName =
                time() .
                '_' .
                Str::random(10) .
                '.' .
                $this->avatar->extension();

            $manager = new ImageManager(new Driver());

            $image = $manager->read(
                $this->avatar->getRealPath()
            );

            $image->cover(300, 300);

            $image->save(
                storage_path('app/public/avatars/' . $avatarName),
                quality: 80
            );

            $user->avatar = $avatarName;
        }

        $user->save();

        $this->currentAvatar = $user->fresh()->avatar;

        $this->avatar = null;

        $this->dispatch(
            'show-toast',
            message: 'پروفایل با موفقیت بروزرسانی شد',
            type: 'success'
        );
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'رمز عبور فعلی را وارد کنید',

            'new_password.required' => 'رمز عبور جدید را وارد کنید',
            'new_password.min' => 'رمز عبور باید حداقل 8 کاراکتر باشد',
            'new_password.confirmed' => 'تکرار رمز عبور مطابقت ندارد',
        ]);

        /** @var User $user */
        $user = Auth::user();

        if (!Hash::check(
            $this->current_password,
            $user->password
        )) {

            $this->dispatch(
                'show-toast',
                message: 'رمز عبور فعلی اشتباه است',
                type: 'error'
            );

            return;
        }

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset([
            'current_password',
            'new_password',
            'new_password_confirmation',
        ]);

        $this->dispatch(
            'show-toast',
            message: 'رمز عبور با موفقیت تغییر یافت',
            type: 'success'
        );
    }

    public function render()
    {
        return view('livewire.profile.update-profile')
            ->layout(
                auth()->user()->role === 'admin'
                    ? 'layouts.admin'
                    : 'layouts.lay',
                [
                    'pageTitle' => $this->pageTitle,
                    'breadcrumbs' => $this->breadcrumbs,
                ]
            );
    }
}
