<div class="row">

    {{-- ستون راست --}}
    <div class="col-xl-4">

        <div class="card shadow-sm border-0">

            <div class="card-header">
                <h4 class="card-title mb-0">
                    اطلاعات کاربر
                </h4>
            </div>

            <div class="card-body text-center">

                @if ($avatar)
                    <img src="{{ $avatar->temporaryUrl() }}"
                        class="rounded-circle mb-3"
                        width="140">
                @else
                    <img src="{{ $currentAvatar
                        ? asset('storage/avatars/'.$currentAvatar)
                        : asset('assets/images/default-avatar.jpg') }}"
                        class="rounded-circle mb-3"
                        width="140">
                @endif

                <h5 class="fw-bold">
                    {{ $name }}
                </h5>

                <p class="text-muted">
                    {{ $email }}
                </p>

                @if($mobile)
                    <span class="badge bg-primary">
                        {{ persian_numbers($mobile) }}
                    </span>
                @endif

            </div>

        </div>

        {{-- تغییر رمز عبور --}}
        <div class="card shadow-sm border-0">

            <div class="card-header">
                <h4 class="card-title mb-0">
                    تغییر رمز عبور
                </h4>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">
                        رمز فعلی
                    </label>

                    <input
                        type="password"
                        wire:model="current_password"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        رمز جدید
                    </label>

                    <input
                        type="password"
                        wire:model="new_password"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        تکرار رمز جدید
                    </label>

                    <input
                        type="password"
                        wire:model="new_password_confirmation"
                        class="form-control">
                </div>

                <button
                    wire:click="changePassword"
                    class="btn btn-primary w-100">

                    بروزرسانی رمز عبور

                </button>

            </div>

        </div>

    </div>

    {{-- ستون چپ --}}
    <div class="col-xl-8">

        <div class="card shadow-sm border-0">

            <div class="card-header">
                <h4 class="card-title mb-0">
                    ویرایش پروفایل
                </h4>
            </div>

            <div class="card-body">

                <form wire:submit.prevent="updateProfile">

                    <div class="row">

                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                نام و نام خانوادگی
                            </label>

                            <input
                                type="text"
                                wire:model="name"
                                class="form-control">

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                ایمیل
                            </label>

                            <input
                                type="email"
                                wire:model="email"
                                class="form-control">

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                شماره موبایل
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    +98
                                </span>

                                <input
                                    type="text"
                                    wire:model="mobile"
                                    class="form-control">

                            </div>

                            @error('mobile')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                تصویر پروفایل
                            </label>

                            <input
                                type="file"
                                wire:model="avatar"
                                class="form-control">

                            @error('avatar')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                    <div class="text-end">

                        <button
                            type="submit"
                            class="btn btn-success">

                            ذخیره تغییرات

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
