<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ویرایش پروفایل</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="updateProfile">
                        <!-- نمایش عکس فعلی و پیش‌نمایش -->
                        <div class="mb-3 text-center">

                            <div class="avatar-container">
                                @if ($avatar)
                                    <img src="{{ $avatar->temporaryUrl() }}" class="profile-avatar-img"
                                        alt="تصویر موقت">
                                @else
                                    <img src="{{ $currentAvatar ? asset('storage/avatars/' . $currentAvatar) : asset('assets/images/default-avatar.jpg') }}"
                                        class="profile-avatar-img" alt="تصویر پروفایل">
                                @endif
                            </div>
                        </div>

                        <!-- آپلود عکس جدید -->
                        <div class="mb-3">
                            <label for="avatar" class="form-label">تغییر عکس پروفایل</label>
                            <input type="file" class="form-control" id="avatar" wire:model="avatar"
                                accept="image/*">
                            @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- نام -->
                        <div class="mb-3">
                            <label for="name" class="form-label">نام</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- ایمیل
                        <div class="mb-3">
                            <label for="email" class="form-label">ایمیل</label>
                            <input type="email" class="form-control" id="email" wire:model="email">-->
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <!-- موبایل
                        <div class="mb-3">
                            <label for="mobile" class="form-label">شماره موبایل</label>
                            <div class="input-group">
                                <span class="input-group-text">+98</span>
                                <input type="text" class="form-control" id="mobile" wire:model="mobile"
                                    maxlength="10" placeholder="9123456789">-->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm w-auto">
                        ذخیره تغییرات
                    </button>
                </div>

            </div>
            @error('mobile')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        </form>
    </div>
</div>
</div>
</div>
</div>
