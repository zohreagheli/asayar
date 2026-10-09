@extends('store.admin.layout')

@section('title', 'جزئیات سفارش | پنل مدیریت نگووید')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-medium text-espresso">سفارش <span class="text-gold" dir="ltr">{{ $order->order_code }}</span></h1>
    <a href="{{ route('admin.orders') }}" class="text-sm text-bronze hover:text-gold">بازگشت</a>
</div>

<div class="grid lg:grid-cols-2 gap-6">
    {{-- Customer Info --}}
    <div class="card p-6">
        <h2 class="text-lg font-medium text-espresso mb-4 pb-2 border-b border-dust">اطلاعات مشتری</h2>
        <div class="space-y-3 text-sm">
            <div class="flex justify-between"><span class="text-bronze">نام:</span><span class="text-espresso">{{ $order->customer_name }}</span></div>
            <div class="flex justify-between"><span class="text-bronze">تلفن:</span><span class="text-espresso" dir="ltr">{{ $order->customer_phone }}</span></div>
            @if($order->customer_email)
                <div class="flex justify-between"><span class="text-bronze">ایمیل:</span><span class="text-espresso" dir="ltr">{{ $order->customer_email }}</span></div>
            @endif
            <div class="flex justify-between"><span class="text-bronze">شهر:</span><span class="text-espresso">{{ $order->city }}</span></div>
            @if($order->postal_code)
                <div class="flex justify-between"><span class="text-bronze">کد پستی:</span><span class="text-espresso" dir="ltr">{{ $order->postal_code }}</span></div>
            @endif
            <div><span class="text-bronze block mb-1">نشانی:</span><span class="text-espresso">{{ $order->address }}</span></div>
            @if($order->notes)
                <div><span class="text-bronze block mb-1">یادداشت:</span><span class="text-espresso">{{ $order->notes }}</span></div>
            @endif
        </div>
    </div>

    {{-- Order Status --}}
    <div class="card p-6">
        <h2 class="text-lg font-medium text-espresso mb-4 pb-2 border-b border-dust">وضعیت سفارش</h2>
        <div class="space-y-3 text-sm mb-6">
            <div class="flex justify-between"><span class="text-bronze">تاریخ ثبت:</span><span class="text-espresso">{{ persian_number($order->created_at->format('Y-m-d')) }}</span></div>
            <div class="flex justify-between"><span class="text-bronze">مبلغ کالا:</span><span class="text-espresso">{{ persian_price($order->total_amount) }}</span></div>
            <div class="flex justify-between"><span class="text-bronze">هزینه ارسال:</span><span class="text-espresso">{{ persian_price($order->shipping_cost) }}</span></div>
            <div class="flex justify-between pt-2 border-t border-dust"><span class="text-espresso font-medium">مبلغ کل:</span><span class="text-espresso font-medium text-lg">{{ persian_price($order->grand_total) }}</span></div>
        </div>

        <form action="{{ route('admin.orders.status', $order) }}" method="POST">
            @csrf
            <label class="block text-sm text-bronze mb-1">تغییر وضعیت</label>
            <div class="flex gap-2">
                <select name="status" class="flex-1">
                    <option value="pending" @if($order->status === 'pending') selected @endif>در انتظار بررسی</option>
                    <option value="processing" @if($order->status === 'processing') selected @endif>در حال پردازش</option>
                    <option value="shipped" @if($order->status === 'shipped') selected @endif>ارسال شده</option>
                    <option value="delivered" @if($order->status === 'delivered') selected @endif>تحویل داده شده</option>
                    <option value="cancelled" @if($order->status === 'cancelled') selected @endif>لغو شده</option>
                </select>
                <button type="submit" class="btn-admin">ثبت</button>
            </div>
        </form>
    </div>
</div>

{{-- Order Items --}}
<div class="card p-6 mt-6">
    <h2 class="text-lg font-medium text-espresso mb-4 pb-2 border-b border-dust">اقلام سفارش</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-bronze text-xs border-b border-dust">
                    <th class="text-right py-2 px-3">نام محصول</th>
                    <th class="text-right py-2 px-3">تعداد</th>
                    <th class="text-right py-2 px-3">قیمت واحد</th>
                    <th class="text-right py-2 px-3">جمع</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr class="border-b border-dust/40">
                        <td class="py-3 px-3 text-espresso">{{ $item->product_name }}</td>
                        <td class="py-3 px-3 text-bronze">{{ persian_number($item->quantity) }}</td>
                        <td class="py-3 px-3 text-bronze">{{ persian_price($item->unit_price) }}</td>
                        <td class="py-3 px-3 text-espresso font-medium">{{ persian_price($item->total_price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
