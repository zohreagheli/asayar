@extends('store.layout')

@section('title', 'تأیید سفارش | نگووید اکسسوریز')

@section('content')
<div class="bg-cream min-h-[60vh]">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 text-center">
        <div class="w-20 h-20 rounded-full bg-gold/10 flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>

        <h1 class="font-display text-3xl text-espresso mb-4" style="font-weight: 300;">سفارش شما ثبت شد</h1>
        <p class="text-bronze mb-8">از خرید شما متشکریم. سفارش شما در حال بررسی است.</p>

        <div class="bg-sand/50 rounded-xl p-6 mb-8 text-right">
            <div class="flex justify-between items-center mb-4 pb-4 border-b border-dust">
                <span class="text-bronze text-sm">کد پیگیری سفارش</span>
                <span class="text-lg font-medium text-gold" dir="ltr">{{ $order->order_code }}</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="text-bronze text-sm">نام گیرنده</span>
                <span class="text-espresso text-sm">{{ $order->customer_name }}</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="text-bronze text-sm">مبلغ کل</span>
                <span class="text-espresso text-sm font-medium">{{ persian_price($order->total_amount) }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-bronze text-sm">وضعیت</span>
                <span class="text-sm text-espresso">{{ $order->status_label }}</span>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('store.track.order', ['order_code' => $order->order_code]) }}" class="btn-outline-gold text-sm">پیگیری سفارش</a>
            <a href="{{ route('store.shop') }}" class="btn-gold text-sm">ادامه خرید</a>
        </div>
    </div>
</div>
@endsection
