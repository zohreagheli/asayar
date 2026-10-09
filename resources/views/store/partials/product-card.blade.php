@php
    $finalPrice = $product->final_price;
    $discountPercent = $product->discount_percent;
    $inStock = $product->in_stock;
@endphp

<div class="card-hover bg-white rounded-xl overflow-hidden border border-dust/40">
    <div class="relative img-zoom aspect-square bg-sand">
        @if($product->main_image)
            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full flex items-center justify-center">
                <svg class="w-16 h-16 text-dust" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.58-4.58A2 2 0 0110 11h4a2 2 0 011.42.58L20 16M6 6h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
            </div>
        @endif

        {{-- Badges --}}
        <div class="absolute top-3 right-3 flex flex-col gap-1.5">
            @if($product->is_new)
                <span class="badge-new">جدید</span>
            @endif
            @if($product->is_bestseller)
                <span class="badge-bestseller">پرفروش</span>
            @endif
            @if($discountPercent)
                <span class="badge-sale">٪{{ persian_number($discountPercent) }} تخفیف</span>
            @endif
        </div>

        @if(!$inStock)
            <div class="absolute inset-0 bg-cream/60 flex items-center justify-center">
                <span class="badge-out-of-stock">ناموجود</span>
            </div>
        @endif
    </div>

    <div class="p-4">
        <a href="{{ route('store.product', $product->slug) }}">
            <h3 class="text-sm font-medium text-espresso mb-2 hover:text-gold transition-colors line-clamp-2 min-h-[2.5rem]">{{ $product->name }}</h3>
        </a>

        {{-- Rating --}}
        <div class="flex items-center gap-0.5 mb-3">
            @for($i = 0; $i < 5; $i++)
                <svg class="w-3.5 h-3.5 {{ $i < 4 ? 'text-gold' : 'text-dust' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            @endfor
        </div>

        {{-- Price --}}
        <div class="flex items-baseline gap-2 mb-3">
            @if($discountPercent)
                <span class="text-sm text-bronze line-through">{{ persian_number($product->price) }}</span>
            @endif
            <span class="text-base font-medium text-espresso">{{ persian_price($finalPrice) }}</span>
        </div>

        {{-- Actions --}}
        <div class="flex gap-2">
            <form action="{{ route('store.cart.add') }}" method="POST" class="flex-1">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="w-full btn-gold text-sm py-2.5" @disabled(!$inStock)>
                    {{ $inStock ? 'افزودن به سبد' : 'ناموجود' }}
                </button>
            </form>
            <button class="w-10 h-10 flex items-center justify-center border border-dust rounded-lg hover:border-gold hover:text-gold transition-colors text-bronze" aria-label="علاقه‌مندی" onclick="this.classList.toggle('text-gold')">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </button>
        </div>
    </div>
</div>
