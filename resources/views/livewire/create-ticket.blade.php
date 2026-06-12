<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-11">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="submitTicket">

                    <div class="row g-4">

                        {{-- عنوان --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                عنوان تیکت
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-edit"></i>
                                </span>

                                <input
                                    type="text"
                                    wire:model="title"
                                    class="form-control"
                                    placeholder="عنوان تیکت را وارد کنید"
                                >

                            </div>

                            @error('title')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- گروه --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                گروه
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-layers"></i>
                                </span>

                                <select
                                    wire:model="category"
                                    class="form-select"
                                >
                                    <option value="">
                                        انتخاب کنید
                                    </option>

                                    <option value="پشتیبانی">
                                        پشتیبانی
                                    </option>

                                    <option value="فنی">
                                        فنی
                                    </option>

                                    <option value="مالی">
                                        مالی
                                    </option>

                                </select>

                            </div>

                            @error('category')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- اولویت --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                اولویت
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-alert-triangle"></i>
                                </span>

                                <select
                                    wire:model="priority"
                                    class="form-select"
                                >
                                    <option value="low">
                                        پایین
                                    </option>

                                    <option value="medium">
                                        متوسط
                                    </option>

                                    <option value="high">
                                        فوری
                                    </option>

                                </select>

                            </div>

                            @error('priority')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- فایل ضمیمه --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                فایل ضمیمه
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-paperclip"></i>
                                </span>

                                <input
                                    type="file"
                                    wire:model="attachment"
                                    class="form-control"
                                >

                            </div>

                            <small class="text-muted">
                                PDF, JPG, PNG (حداکثر 5MB)
                            </small>

                            @error('attachment')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror

                            @if ($attachment)
                                <small class="text-success d-block mt-2">
                                    {{ $attachment->getClientOriginalName() }}
                                </small>
                            @endif

                        </div>

                        {{-- توضیحات --}}
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                توضیحات
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text textarea-icon">
                                    <i class="fe fe-file-text"></i>
                                </span>

                                <textarea
                                    wire:model="description"
                                    class="form-control"
                                    rows="5"
                                    placeholder="توضیحات تیکت را وارد کنید"
                                ></textarea>

                            </div>

                            @error('description')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                    <div class="mt-4 text-end">

                        <button
                            type="submit"
                            class="btn btn-primary px-5 rounded-pill"
                        >
                            ثبت تیکت
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
