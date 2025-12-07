<div class="container py-4">
    <div class="app-content">

        {{-- عنوان --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-primary"> ثبت نوبت</h4>
        </div>

        {{-- Toast پیام‌ها --}}
        <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 9999;">
            @if (session('success'))
                <div class="toast align-items-center text-bg-success border-0 show">
                    <div class="d-flex">
                        <div class="toast-body">{{ session('success') }}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="toast align-items-center text-bg-danger border-0 show">
                    <div class="d-flex">
                        <div class="toast-body">{{ session('error') }}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            @endif
        </div>

        <form wire:submit.prevent="save" class="card shadow">
            <div class="card-body">

                {{-- مرحله ۱ --}}
                <div class="step-1" style="{{ $step == 1 ? '' : 'display:none;' }}">
                    <div class="row">

                        {{-- خدمت --}}
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <span class="label-inside">خدمت</span>
                                <select wire:model="selectedService" class="form-select">
                                    <option value="">-- انتخاب کنید --</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">
                                            {{ $service->name }} ({{ $service->duration }} دقیقه)
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('selectedService')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- تاریخ --}}
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <span class="label-inside">تاریخ</span>
                                <input type="text" id="datepicker" class="form-control" autocomplete="off" placeholder="تاریخ را انتخاب کنید">
                                <input type="hidden" wire:model="date" id="appointment_date">
                            </div>
                            @if ($date)
                                <div class="alert alert-info mt-2">
                                    تاریخ انتخاب شده:
                                    <strong>{{ $this->convertToPersianNumbers($date) }}</strong>
                                </div>
                            @endif
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- آدرس --}}
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <span class="label-inside">آدرس</span>
                                <textarea wire:model="address" class="form-control" rows="3" placeholder="آدرس را وارد کنید..."></textarea>
                            </div>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- سرویس‌کار --}}
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <span class="label-inside">سرویس‌کار</span>
                                <select wire:model="selectedTechnician" class="form-select">
                                    <option value="">-- انتخاب کنید --</option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician->id }}">
                                            {{ $technician->name }}
                                            {{ $technician->expertise ? '(' . $technician->expertise . ')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('selectedTechnician')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($selectedTechnician === 'suggest')
                            <button type="button" class="btn btn-outline-primary" wire:click="suggestTechnicians">
                                پیشنهاد سرویس‌کار
                            </button>
                        @endif

                        @if ($showTechnicianSuggestions)
                            <div class="list-group mt-2">
                                @foreach ($suggestedTechnicians as $tech)
                                    <button type="button" class="list-group-item list-group-item-action"
                                        wire:click="$set('selectedTechnician', '{{ $tech->id }}')">
                                        {{ $tech->name }}
                                        {{ $tech->expertise ? '(' . $tech->expertise . ')' : '' }}
                                    </button>
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <button type="button" class="btn btn-primary mt-3" wire:click="nextStep">
                        ادامه و انتخاب زمان
                    </button>
                </div>

                {{-- مرحله ۲ --}}
                <div class="step-2" style="{{ $step == 2 ? '' : 'display:none;' }}">
                    @if(count($availableSlots) > 0)
                        <div class="mb-3">
                            <label class="form-label">ساعت‌های موجود</label>
                            <div class="list-group">
                                @foreach($availableSlots as $slot)
                                    @if($slot['available'])
                                        <button type="button" class="list-group-item list-group-item-action {{ $time === $slot['id'] ? 'active' : '' }}" wire:click="$set('time','{{ $slot['id'] }}')">
                                            {{ $slot['display_persian'] }}
                                        </button>
                                    @else
                                        <div class="list-group-item disabled">
                                            {{ $slot['display_persian'] }}
                                            - <small class="text-muted">غیر قابل انتخاب</small>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @error('time')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    @else
                        <div class="alert alert-warning">برای این سرویس‌کار زمانی وجود ندارد.</div>
                    @endif

                    <div class="d-flex gap-2 mt-3">
                        <button type="button" class="btn btn-secondary" wire:click="prevStep">بازگشت</button>
                        <button type="submit" class="btn btn-success" @if(!$time) disabled @endif>ثبت نوبت</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // فعال‌سازی Toast
    document.querySelectorAll('.toast').forEach(toastEl => {
        new bootstrap.Toast(toastEl).show();
    });

    // Init PersianDatepicker
    function initDatePicker(){
        let dpInput = $("#datepicker");
        let hiddenInput = document.getElementById('appointment_date');
        if(!dpInput.length || !dpInput.is(':visible')) return;

        if(dpInput.data("datepicker")){
            dpInput.data("datepicker").destroy();
        }

        dpInput.persianDatepicker({
            format: "YYYY/MM/DD",
            altField: "#appointment_date",
            altFormat: "YYYY/MM/DD",
            initialValue: false,
            autoClose: true,
            observer: true,
            onSelect: function(){
                let persianDate = hiddenInput.value;
                let englishDate = persianDate.replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d));
                hiddenInput.value = englishDate;
                hiddenInput.dispatchEvent(new Event('input'));
            }
        });

        if(hiddenInput.value){
            dpInput.data("datepicker").setDate(hiddenInput.value);
        }
    }

    // اجرا در بارگذاری اولیه
    document.addEventListener("DOMContentLoaded", initDatePicker);

    // اجرا بعد از هر رندر Livewire
    Livewire.hook('message.processed', () => {
        setTimeout(initDatePicker, 50);
    });
</script>
@endpush
