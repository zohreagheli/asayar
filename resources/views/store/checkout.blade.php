@extends('store.layout')

@section('title', 'تسویه‌حساب | نگووید اکسسوریز')
@section('meta_description', 'تسویه‌حساب و ثبت سفارش در فروشگاه نگووید اکسسوریز')

@section('content')
<div class="bg-cream min-h-[60vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="flex items-center gap-2 text-sm text-bronze mb-6">
            <a href="{{ route('store.home') }}" class="hover:text-gold transition-colors">خانه</a>
            <span>/</span>
            <a href="{{ route('store.cart') }}" class="hover:text-gold transition-colors">سبد خرید</a>
            <span>/</span>
            <span class="text-espresso">تسویه‌حساب</span>
        </div>

        <h1 class="font-display text-3xl text-espresso mb-8" style="font-weight: 300;">تسویه‌حساب</h1>

        <form action="{{ route('store.checkout.submit') }}" method="POST" class="grid lg:grid-cols-2 gap-8">
            @csrf

            {{-- Customer Info --}}
            <div>
                <h2 class="text-lg font-medium text-espresso mb-4 pb-2 border-b border-dust">اطلاعات گیرنده</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-bronze mb-1">نام و نام خانوادگی <span class="text-red-500">*</span></label>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
                        @error('customer_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-bronze mb-1">شماره تماس <span class="text-red-500">*</span></label>
                        <input type="tel" name="customer_phone" value="{{ old('customer_phone') }}" required dir="ltr">
                        @error('customer_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-bronze mb-1">ایمیل</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email') }}" dir="ltr">
                        @error('customer_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-bronze mb-1">نشانی <span class="text-red-500">*</span></label>
                        <textarea name="address" rows="3" required>{{ old('address') }}</textarea>
                        @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-bronze mb-1">شهر <span class="text-red-500">*</span></label>
                            <input type="text" name="city" value="{{ old('city') }}" required>
                            @error('city') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-bronze mb-1">کد پستی</label>
                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" dir="ltr">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-bronze mb-1">یادداشت سفارش</label>
                        <textarea name="notes" rows="2">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Order Summary --}}
            <div>
                <h2 class="text-lg font-medium text-espresso mb-4 pb-2 border-b border-dust">خلاصه سفارش</h2>
                <div class="bg-sand/50 rounded-xl p-4">
                    <div class="space-y-3 mb-4">
                        @foreach($items as $id => $item)
                            <div class="flex justify-between text-sm">
                                <span class="text-bronze">{{ $item['name'] }} × {{ persian_number($item['quantity']) }}</span>
                                <span class="text-espresso">{{ persian_number($item['price'] * $item['quantity']) }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t border-dust pt-3 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-bronze">جمع کالا</span>
                            <span class="text-espresso">{{ persian_price($subtotal) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-bronze">هزینه ارسال</span>
                            <span class="text-espresso">پس از تأیید محاسبه می‌شود</span>
                        </div>
                        <div class="flex justify-between pt-2 border-t border-dust">
                            <span class="text-espresso font-medium">مبلغ قابل پرداخت</span>
                            <span class="text-lg font-medium text-espresso">{{ persian_price($subtotal) }}</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-gold w-full mt-6">ثبت سفارش</button>
                <p class="text-xs text-bronze text-center mt-3">پس از ثبت سفارش، کد پیگیری شما نمایش داده می‌شود.</p>
            </div>
        </form>
    </div>
</div>
@endsection
