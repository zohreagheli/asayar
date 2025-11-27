<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\User;


class UpdateProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $mobile;          // اضافه شد
    public $avatar;
    public $currentAvatar;

    public function mount()
    {
        /** @var User $user */
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile ? substr($user->mobile, 3) : null; // حذف +98 برای نمایش
        $this->currentAvatar = $user->avatar;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'mobile' => 'nullable|digits:10|unique:users,mobile,' . Auth::id(),
            'avatar' => 'nullable|image|max:2048',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;

        // ذخیره موبایل به فرمت +98
        $user->mobile = $this->mobile ? '+98' . ltrim($this->mobile, '0') : null;

        // اگر آواتار جدید آپلود شده باشد
        if ($this->avatar) {
            if ($user->avatar && Storage::exists('public/avatars/'.$user->avatar)) {
                Storage::delete('public/avatars/'.$user->avatar);
            }

            $avatarName = time().'_'.Str::random(10).'.'.$this->avatar->extension();

            $manager = new ImageManager(new Driver());
            $image = $manager->read($this->avatar->getRealPath());
            $image->cover(300, 300);
            $image->save(storage_path('app/public/avatars/'.$avatarName), quality: 80);

            $user->avatar = $avatarName;
        }

        $user->save();

        $this->currentAvatar = $user->fresh()->avatar;
        $this->avatar = null;

        $this->js("
            Toastify({
                text: 'پروفایل با موفقیت به‌روزرسانی شد',
                duration: 3000,
                close: true,
                gravity: 'top',
                position: 'left',
                backgroundColor: '#4fbe87',
            }).showToast();
        ");

        if ($user->role === 'admin') {
            return $this->redirect(route('admin.dashboard'), navigate: true);
        } else {
            return $this->redirect(route('dashboard'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.profile.update-profile')
        ->layout(auth()->user()->role === 'admin'
            ? 'layouts.admin'
            : 'layouts.lay'  );
    }
}

