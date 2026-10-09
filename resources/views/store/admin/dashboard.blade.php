@extends('store.admin.layout')

@section('title', 'داشبورد | پنل مدیریت نگووید')

@section('content')
<h1 class="text-2xl font-medium text-espresso mb-6">داشبورد</h1>

<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="card p-5">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-lg bg-gold/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <span class="text-sm text-bronze">محصولات</span>
        </div>
        <p class="text-2xl font-medium text-espresso">{{ persian_number($productCount) }}</p>
    </div>
    <div class="card p-5">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-lg bg-gold/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <span class="text-sm text-bronze">سفارش‌ها</span>
        </div>
        <p class="text-2xl font-medium text-espresso">{{ persian_number($orderCount) }}</p>
    </div>
    <div class="card p-5">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-lg bg-orange-50 flex items-center justify-center">
                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <span class="text-sm text-bronze">در انتظار</span>
        </div>
        <p class="text-2xl font-medium text-espresso">{{ persian_number($pendingOrders) }}</p>
    </div>
    <div class="card p-5">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-lg bg-gold/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <span class="text-sm text-bronze">اعضای خبرنامه</span>
        </div>
        <p class="text-2xl font-medium text-espresso">{{ persian_number($subscriberCount) }}</p>
    </div>
</div>

<div class="card p-5">
    <h2 class="text-lg font-medium text-espresso mb-4 pb-2 border-b border-dust">آخرین سفارش‌ها</h2>
    @if($recentOrders->isEmpty())
        <p class="text-sm text-bronze text-center py-8">هنوز سفارشی ثبت نشده است.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-bronze text-xs border-b border-dust">
                        <th class="text-right py-2 px-3">کد پیگیری</th>
                        <th class="text-right py-2 px-3">نام مشتری</th>
                        <th class="text-right py-2 px-3">مبلغ</th>
                        <th class="text-right py-2 px-3">وضعیت</th>
                        <th class="text-right py-2 px-3">تاریخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        <tr class="border-b border-dust/40">
                            <td class="py-3 px-3"><a href="{{ route('admin.orders.show', $order) }}" class="text-gold hover:underline" dir="ltr">{{ $order->order_code }}</a></td>
                            <td class="py-3 px-3 text-espresso">{{ $order->customer_name }}</td>
                            <td class="py-3 px-3 text-espresso">{{ persian_price($order->total_amount) }}</td>
                            <td class="py-3 px-3"><span class="text-xs px-2 py-1 rounded-full bg-gold/10 text-gold">{{ $order->status_label }}</span></td>
                            <td class="py-3 px-3 text-bronze text-xs">{{ $order->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
