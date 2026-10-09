@extends('store.layout')

@section('title', 'پیگیری سفارش | نگووید اکسسوریز')

@section('content')
<div class="bg-cream min-h-[60vh]">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="text-center mb-8">
            <h1 class="font-display text-3xl text-espresso mb-2" style="font-weight: 300;">پیگیری سفارش</h1>
            <p class="text-bronze text-sm">کد پیگیری سفارش خود را وارد کنید.</p>
        </div>

        <form action="{{ route('store.track.order.submit') }}" method="GET" class="flex gap-3 max-w-md mx-auto mb-8">
            <input type="text" name="order_code" value="{{ old('order_code', request('order_code')) }}" placeholder="مثال: NGV-XXXXXXXX" dir="ltr" class="flex-1">
            <button type="submit" class="btn-gold whitespace-nowrap">پیگیری</button>
        </form>

        @if(session('error'))
            <div class="max-w-md mx-auto bg-red-50 border border-red-200 rounded-lg p-4 text-center text-red-700 text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if($order)
            <div class="bg-sand/50 rounded-xl p-6 max-w-md mx-auto">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-dust">
                    <span class="text-bronze text-sm">کد پیگیری</span>
                    <span class="text-lg font-medium text-gold" dir="ltr">{{ $order->order_code }}</span>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-bronze">نام گیرنده</span>
                        <span class="text-espresso">{{ $order->customer_name }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-bronze">تاریخ ثبت</span>
                        <span class="text-espresso">{{ persian_number($order->created_at->format('Y-m-d')) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-bronze">مبلغ کل</span>
                        <span class="text-espresso font-medium">{{ persian_price($order->total_amount) }}</span>
                    </div>
                    <div class="flex justify-between text-sm pt-3 border-t border-dust">
                        <span class="text-bronze">وضعیت سفارش</span>
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs
                            @if($order->status === 'pending') bg-gold/20 text-gold
                            @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                            @elseif($order->status === 'shipped') bg-purple-100 text-purple-700
                            @elseif($order->status === 'delivered') bg-green-100 text-green-700
                            @else bg-red-100 text-red-700 @endif">
                            {{ $order->status_label }}
                        </span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
