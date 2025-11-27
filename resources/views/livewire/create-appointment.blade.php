 @push('styles')
     <style>
         /* حالت hover */
         .list-group-item-action:hover {
             background-color: #f0f8ff;
             /* آبی روشن */
             color: #0d6efd;
             /* آبی اصلی بوت‌استرپ */
             border-right: 4px solid #0d6efd;
             cursor: pointer;
             transition: all 0.2s ease-in-out;
         }

         /* حالت انتخاب‌شده */
         .list-group-item-action.active {
             background-color: #0d6efd !important;
             /* آبی اصلی */
             color: #fff !important;
             /* متن سفید */
             border-right: 4px solid #084298;
             /* آبی تیره‌تر */
         }

         /* آیکون تیک */
         .checkmark {
             font-size: 1.2rem;
         }
     </style>
 @endpush
 <div class="container py-4">
     <div class="app-content">

         {{-- پیام‌ها --}}
         @if (session('success'))
             <div class="alert alert-success">{{ session('success') }}</div>
         @endif
         @if (session('error'))
             <div class="alert alert-danger">{{ session('error') }}</div>
         @endif

         <form wire:submit.prevent="save" class="card shadow">
             <div class="card-body">
                 <h3 class="card-title">فرم ثبت نوبت</h3>

                 {{-- مرحله ۱ --}}
                 @if ($step == 1)
                     {{-- خدمت --}}
                     <div class="mb-3">
                         <label class="form-label">خدمت مورد نیاز</label>
                         <select wire:model="selectedService" class="form-select">
                             <option value="">-- انتخاب کنید --</option>
                             @foreach ($services as $service)
                                 <option value="{{ $service->id }}">
                                     {{ $service->name }} ({{ $service->duration }} دقیقه)
                                 </option>
                             @endforeach
                         </select>
                         @error('selectedService')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>

                     {{-- تاریخ --}}
                     <div class="mb-3">
                         <label class="form-label">تاریخ</label>
                         <input type="text" id="datepicker" class="form-control" autocomplete="off"
                             placeholder="تاریخ را انتخاب کنید">
                         <input type="hidden" wire:model="date" id="appointment_date">
                         @error('date')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>

                     @if ($date)
                         <div class="alert alert-info">
                             تاریخ انتخاب شده: <strong>{{ $this->convertToPersianNumbers($date) }}</strong>
                         </div>
                     @endif

                     {{-- آدرس --}}
                     <div class="mb-3">
                         <label class="form-label">آدرس دقیق</label>
                         <textarea wire:model="address" class="form-control" rows="3"></textarea>
                         @error('address')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>

                     {{-- سرویس‌کار --}}
                     <div class="mb-3">
                         <label class="form-label">سرویس‌کار مورد نظر</label>
                         <select wire:model="selectedTechnician" class="form-select">
                             <option value="">-- انتخاب کنید --</option>
                             @foreach ($technicians as $technician)
                                 <option value="{{ $technician->id }}">
                                     {{ $technician->name }}
                                     {{ $technician->expertise ? '(' . $technician->expertise . ')' : '' }}
                                 </option>
                             @endforeach

                         </select>
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

                     <button type="button" class="btn btn-primary mt-3" wire:click="nextStep">
                         ادامه و انتخاب زمان
                     </button>
                 @endif

                 {{-- مرحله ۲ --}}
                 @if ($step == 2)
                     @if (count($availableSlots) > 0)
                         <div class="mb-3">
                             <label class="form-label">ساعت‌های موجود</label>
                             <div class="list-group">
                                 @foreach ($availableSlots as $slot)
                                     @if ($slot['available'])
                                         <button type="button"
                                             class="list-group-item list-group-item-action {{ $time === $slot['id'] ? 'active' : '' }}"
                                             wire:click="$set('time', '{{ $slot['id'] }}')">
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
                             @error('time')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                     @else
                         <div class="alert alert-warning">برای این سرویس‌کار زمانی وجود ندارد.</div>
                     @endif

                     <div class="d-flex gap-2 mt-3">
                         <button type="button" class="btn btn-secondary" wire:click="prevStep">بازگشت</button>
                         <button type="submit" class="btn btn-success"
                             @if (!$time) disabled @endif>ثبت نوبت</button>
                     </div>
                 @endif

             </div>
         </form>
     </div>
 </div>

 @push('scripts')
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             $("#datepicker").persianDatepicker({
                 format: "YYYY/MM/DD", // فرمت نمایش
                 altField: "#appointment_date", // hidden input برای Livewire
                 altFormat: "YYYY/MM/DD", // فرمت داخل hidden input
                 initialValue: false,
                 autoClose: true,
                 timePicker: {
                     enabled: false
                 },
                 calendar: {
                     persian: {
                         locale: 'fa',
                         leapYearMode: "astronomical"
                     }
                 },
                 // 👇 این خط مهمه:
                 observer: true,
                 toolbox: {
                     calendarSwitch: {
                         enabled: false
                     }
                 },
                 onSelect: function() {
                     let hiddenInput = document.getElementById('appointment_date');
                     let persianDate = hiddenInput.value;

                     // تبدیل اعداد فارسی به انگلیسی
                     let englishDate = persianDate.replace(/[۰-۹]/g, function(d) {
                         return '۰۱۲۳۴۵۶۷۸۹'.indexOf(d);
                     });

                     hiddenInput.value = englishDate;

                     // اطلاع به Livewire
                     hiddenInput.dispatchEvent(new Event('input'));
                 }
             });
         });
     </script>
 @endpush
