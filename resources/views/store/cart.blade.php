@extends('store.layout')

@section('title', 'سبد خرید | نگووید اکسسوریز')
@section('meta_description', 'سبد خرید شما در فروشگاه نگووید اکسسوریز')

@section('content')
<div class="bg-cream min-h-[60vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="flex items-center gap-2 text-sm text-bronze mb-6">
            <a href="{{ route('store.home') }}" class="hover:text-gold transition-colors">خانه</a>
            <span>/</span>
            <span class="text-espresso">سبد خرید</span>
        </div>

        <h1 class="font-display text-3xl text-espresso mb-8" style="font-weight: 300;">سبد خرید</h1>

        @if(empty($items))
            <div class="text-center py-20">
                <svg class="w-20 h-20 text-dust mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <p class="text-bronze mb-6">سبد خرید شما خالی است.</p>
                <a href="{{ route('store.shop') }}" class="btn-gold">شروع خرید</a>
            </div>
        @else
            <div class="space-y-4 mb-8">
                @foreach($items as $id => $item)
                    <div class="bg-white rounded-xl p-4 border border-dust/40 flex gap-4 items-center">
                        <div class="w-20 h-20 rounded-lg overflow-hidden bg-sand flex-shrink-0">
                            @if($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-dust" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.58-4.58A2 2 0 0110 11h4a2 2 0 011.42.58L20 16M6 6h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
                                </div>
                            @endif
                        </div>

                        <div class="flex-1 min-w-0">
                            <a href="{{ route('store.product', \App\Models\Product::find($id)?->slug ?? '#') }}" class="text-sm font-medium text-espresso hover:text-gold transition-colors block mb-1">{{ $item['name'] }}</a>
                            <p class="text-sm text-bronze">{{ persian_price($item['price']) }}</p>
                        </div>

                        <div class="flex items-center border border-dust rounded-lg overflow-hidden">
                            <form action="{{ route('store.cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}" class="w-8 h-8 flex items-center justify-center hover:bg-sand text-bronze text-sm">-</button>
                            </form>
                            <span class="w-10 text-center text-sm text-espresso">{{ persian_number($item['quantity']) }}</span>
                            <form action="{{ route('store.cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="w-8 h-8 flex items-center justify-center hover:bg-sand text-bronze text-sm">+</button>
                            </form>
                        </div>

                        <div class="text-left">
                            <p class="text-sm font-medium text-espresso mb-1">{{ persian_price($item['price'] * $item['quantity']) }}</p>
                            <form action="{{ route('store.cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button type="submit" class="text-xs text-bronze hover:text-red-500 transition-colors">حذف</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Summary --}}
            <div class="bg-sand/50 rounded-xl p-6">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-bronze">جمع کل</span>
                    <span class="text-lg font-medium text-espresso">{{ persian_price($subtotal) }}</span>
                </div>
                <div class="flex justify-between items-center mb-4 text-sm">
                    <span class="text-bronze">هزینه ارسال</span>
                    <span class="text-espresso">در مرحله بعد محاسبه می‌شود</span>
                </div>
                <div class="border-t border-dust pt-4 flex justify-between items-center mb-6">
                    <span class="text-espresso font-medium">مبلغ قابل پرداخت</span>
                    <span class="text-xl font-medium text-espresso">{{ persian_price($subtotal) }}</span>
                </div>
                <a href="{{ route('store.checkout') }}" class="btn-gold w-full">ادامه خرید و ثبت سفارش</a>
                <a href="{{ route('store.shop') }}" class="block text-center text-sm text-bronze hover:text-gold mt-3">ادامه خرید</a>
            </div>
        @endif
    </div>
</div>
@endsection
