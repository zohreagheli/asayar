@extends('store.admin.layout')

@section('title', 'سفارش‌ها | پنل مدیریت نگووید')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-medium text-espresso">مدیریت سفارش‌ها</h1>
    <select onchange="window.location.href='{{ route('admin.orders') }}' + (this.value ? '?status=' + this.value : '')" class="w-auto">
        <option value="">همه وضعیت‌ها</option>
        <option value="pending" @if(request('status') === 'pending') selected @endif>در انتظار بررسی</option>
        <option value="processing" @if(request('status') === 'processing') selected @endif>در حال پردازش</option>
        <option value="shipped" @if(request('status') === 'shipped') selected @endif>ارسال شده</option>
        <option value="delivered" @if(request('status') === 'delivered') selected @endif>تحویل داده شده</option>
        <option value="cancelled" @if(request('status') === 'cancelled') selected @endif>لغو شده</option>
    </select>
</div>

<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-bronze text-xs border-b border-dust">
                    <th class="text-right py-3 px-4">کد پیگیری</th>
                    <th class="text-right py-3 px-4">مشتری</th>
                    <th class="text-right py-3 px-4">مبلغ</th>
                    <th class="text-right py-3 px-4">وضعیت</th>
                    <th class="text-right py-3 px-4">تاریخ</th>
                    <th class="text-right py-3 px-4">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="border-b border-dust/40 hover:bg-sand/30">
                        <td class="py-3 px-4"><a href="{{ route('admin.orders.show', $order) }}" class="text-gold hover:underline" dir="ltr">{{ $order->order_code }}</a></td>
                        <td class="py-3 px-4 text-espresso">{{ $order->customer_name }}</td>
                        <td class="py-3 px-4 text-espresso">{{ persian_price($order->total_amount) }}</td>
                        <td class="py-3 px-4">
                            <span class="text-xs px-2 py-1 rounded-full
                                @if($order->status === 'pending') bg-gold/10 text-gold
                                @elseif($order->status === 'processing') bg-blue-50 text-blue-700
                                @elseif($order->status === 'shipped') bg-purple-50 text-purple-700
                                @elseif($order->status === 'delivered') bg-green-50 text-green-700
                                @else bg-red-50 text-red-700 @endif">
                                {{ $order->status_label }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-bronze text-xs">{{ $order->created_at->diffForHumans() }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-gold hover:underline text-xs">مشاهده</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">{{ $orders->links() }}</div>
@endsection
