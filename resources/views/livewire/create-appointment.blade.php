<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-11">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="save">

                    <div class="row g-4">

                        {{-- سرویس --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                نوع سرویس
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-settings"></i>
                                </span>

                                <select class="form-select" wire:model="service_id">

                                    <option value="">
                                        انتخاب کنید
                                    </option>

                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">
                                            {{ $service->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            @error('service_id')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- تاریخ --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                تاریخ مراجعه
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-calendar"></i>
                                </span>

                                <input id="datepicker" data-jdp autocomplete="off" class="form-control have-datepicker"
                                    placeholder="انتخاب تاریخ">

                            </div>

                            @error('date')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- زمان --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                بازه زمانی
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-clock"></i>
                                </span>

                                <select wire:model="time" class="form-select">

                                    <option value="">
                                        انتخاب کنید
                                    </option>

                                    <option value="08:00-12:00">
                                        ۸ تا ۱۲
                                    </option>

                                    <option value="12:00-16:00">
                                        ۱۲ تا ۱۶
                                    </option>

                                    <option value="16:00-20:00">
                                        ۱۶ تا ۲۰
                                    </option>

                                </select>

                            </div>

                            @error('time')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- آدرس --}}
                        <div class="col-md-6">

                            <label class="form-label fw-semibold">
                                آدرس
                            </label>

                            <div class="input-group custom-input-group">

                                <span class="input-group-text">
                                    <i class="fe fe-map-pin"></i>
                                </span>

                                <input type="text" wire:model="address" class="form-control"
                                    placeholder="آدرس را وارد کنید">

                            </div>

                            @error('address')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

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

                                <textarea wire:model="description" class="form-control" rows="4" placeholder="توضیحات تکمیلی"></textarea>

                            </div>

                        </div>

                    </div>

                    <div class="mt-4 text-end">

                        <button type="submit" class="btn btn-primary px-5 rounded-pill">

                            ثبت درخواست

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


@push('js')
    <script src="{{ asset('libs/datepicker/jalalidatepicker.min.js') }}"></script>

    <script>
        function initDatepicker() {

            if (!window.jalaliDatepicker) {
                return;
            }

            jalaliDatepicker.startWatch();

            const input = document.getElementById('datepicker');

            if (!input) {
                return;
            }

            function toPersianNumbers(str) {
                const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                const fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

                return str.replace(/[0-9]/g, function(w) {
                    return fa[en.indexOf(w)];
                });
            }
            input.addEventListener('change', function() {

                const value = this.value;

                const component = Livewire.find(
                    document.querySelector('[wire\\:id]').getAttribute('wire:id')
                );

                component.set('date', value);
                this.value = toPersianNumbers(value);
            });
        }

        document.addEventListener('DOMContentLoaded', initDatepicker);
        document.addEventListener('livewire:navigated', initDatepicker);
    </script>
@endpush
