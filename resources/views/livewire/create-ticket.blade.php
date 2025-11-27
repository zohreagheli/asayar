<div class="bg-light min-vh-100">
    <!-- هدر اصلی (اگر وجود دارد) -->
    <div class="app-content">
    <!-- محتوای اصلی -->
    <div class="container">
        <!-- نوار سبز رنگ (حذف fixed-top و همتراز با فرم) -->
        <div class="bg-success text-white p-3 mt-3"> <!-- mt-3 برای فاصله از هدر -->
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="h5 mb-0">ایجاد تیکت جدید</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#f9f9f9" fill-rule="evenodd"
                        d="M9.944 3.25h4.112c1.838 0 3.294 0 4.433.153c1.172.158 2.121.49 2.87 1.238c.748.749 1.08 1.698 1.238 2.87c.153 1.14.153 2.595.153 4.433v.112c0 1.838 0 3.294-.153 4.433c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.944c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433v-.112c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.749-.748 1.698-1.08 2.87-1.238c1.14-.153 2.595-.153 4.433-.153M5.71 4.89c-1.006.135-1.586.389-2.01.812c-.422.423-.676 1.003-.811 2.009c-.138 1.028-.14 2.382-.14 4.289s.002 3.262.14 4.29c.135 1.005.389 1.585.812 2.008s1.003.677 2.009.812c1.028.138 2.382.14 4.289.14h4c1.907 0 3.262-.002 4.29-.14c1.005-.135 1.585-.389 2.008-.812s.677-1.003.812-2.009c.138-1.028.14-2.382.14-4.289s-.002-3.261-.14-4.29c-.135-1.005-.389-1.585-.812-2.008s-1.003-.677-2.009-.812c-1.027-.138-2.382-.14-4.289-.14h-4c-1.907 0-3.261.002-4.29.14m-.287 2.63a.75.75 0 0 1 1.056-.096L8.64 9.223c.933.777 1.58 1.315 2.128 1.667c.529.34.888.455 1.233.455s.704-.114 1.233-.455c.547-.352 1.195-.89 2.128-1.667l2.159-1.8a.75.75 0 1 1 .96 1.153l-2.196 1.83c-.887.74-1.605 1.338-2.24 1.746c-.66.425-1.303.693-2.044.693s-1.384-.269-2.045-.693c-.634-.408-1.352-1.007-2.239-1.745L5.52 8.577a.75.75 0 0 1-.096-1.057"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <!-- فرم ایجاد تیکت -->
        <form wire:submit.prevent="submitTicket" class="bg-white p-4 rounded-0 shadow-sm">
            <!-- بقیه کدهای فرم بدون تغییر -->
            <div class="row g-3 mb-4">
                <!-- فیلد عنوان -->
                <div class="col-md-4">
                    <label for="title" class="form-label">عنوان</label>
                    <input type="text" id="title" wire:model="title"
                        class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- فیلد گروه -->
                <div class="col-md-4">
                    <label for="category" class="form-label">گروه</label>
                    <select id="category" wire:model="category"
                        class="form-select @error('category') is-invalid @enderror">
                        <option value="">انتخاب کنید</option>
                        <option value="پشتیبانی">پشتیبانی</option>
                        <option value="فنی">فنی</option>
                        <option value="مالی">مالی</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label d-block">اولویت</label>
                    <div class="d-flex gap-3 mt-1">
                        <div class="form-check">
                            <input type="radio" wire:model="priority" value="low" id="priority-low"
                                class="form-check-input text-success">
                            <label for="priority-low" class="form-check-label">پایین</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" wire:model="priority" value="medium" id="priority-medium"
                                class="form-check-input text-warning" checked>
                            <label for="priority-medium" class="form-check-label">متوسط</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" wire:model="priority" value="high" id="priority-high"
                                class="form-check-input text-danger">
                            <label for="priority-high" class="form-check-label">فوری</label>
                        </div>
                    </div>
                </div>
                @error('priority')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- فیلد توضیحات -->
            <div class="mb-4">
                <label for="description" class="form-label">توضیحات</label>
                <textarea id="description" wire:model="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="attachment" class="form-label">ضمیمه (اختیاری)</label>
                <input type="file" id="attachment" wire:model="attachment"
                    class="form-control @error('attachment') is-invalid @enderror">
                @error('attachment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">فرمت‌های مجاز: PDF, JPG, PNG (حداکثر 5MB)</small>
            </div>
            @if ($attachment)
                <div class="mt-2">
                    <small>فایل انتخاب شده:</small>
                    <div>{{ $attachment->getClientOriginalName() }}</div>
                </div>
            @endif
            <button type="submit" class="btn btn-success">ثبت تیکت</button>
        </form>
    </div>
</div>
</div>
