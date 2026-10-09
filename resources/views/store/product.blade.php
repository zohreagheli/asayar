@extends('store.layout')

@section('title', $product->name . ' | نگووید اکسسوریز')
@section('meta_description', \Illuminate\Support\Str::limit($product->description ?? $product->name, 160))

@section('content')
<div class="bg-cream">
    {{-- Breadcrumb --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center gap-2 text-sm text-bronze">
            <a href="{{ route('store.home') }}" class="hover:text-gold transition-colors">خانه</a>
            <span>/</span>
            <a href="{{ route('store.shop') }}" class="hover:text-gold transition-colors">فروشگاه</a>
            <span>/</span>
            <a href="{{ route('store.shop', ['category' => $product->category->slug]) }}" class="hover:text-gold transition-colors">{{ $product->category->name }}</a>
            <span>/</span>
            <span class="text-espresso">{{ $product->name }}</span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
            {{-- Gallery --}}
            <div class="lg:sticky lg:top-28 lg:self-start">
                <div class="aspect-square rounded-2xl overflow-hidden bg-sand mb-4">
                    @if($product->main_image)
                        <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover" id="main-product-image">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-24 h-24 text-dust" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.58-4.58A2 2 0 0110 11h4a2 2 0 011.42.58L20 16M6 6h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
                        </div>
                    @endif
                </div>

                @if($product->images->isNotEmpty())
                    <div class="grid grid-cols-4 gap-2">
                        @if($product->main_image)
                            <div class="aspect-square rounded-lg overflow-hidden bg-sand border-2 border-gold cursor-pointer">
                                <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        @foreach($product->images as $image)
                            <div class="aspect-square rounded-lg overflow-hidden bg-sand border-2 border-transparent hover:border-gold cursor-pointer transition-colors">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Info --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    @if($product->is_new)
                        <span class="badge-new">جدید</span>
                    @endif
                    @if($product->is_bestseller)
                        <span class="badge-bestseller">پرفروش</span>
                    @endif
                    @if($product->discount_percent)
                        <span class="badge-sale">٪{{ persian_number($product->discount_percent) }} تخفیف</span>
                    @endif
                </div>

                <h1 class="font-display text-2xl lg:text-3xl text-espresso mb-4" style="font-weight: 300;">{{ $product->name }}</h1>

                {{-- Rating --}}
                <div class="flex items-center gap-2 mb-6">
                    <div class="flex items-center gap-0.5">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 {{ $i < 4 ? 'text-gold' : 'text-dust' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <span class="text-sm text-bronze">(۰ نظر)</span>
                </div>

                {{-- Price --}}
                <div class="flex items-baseline gap-3 mb-6">
                    <span class="text-2xl font-medium text-espresso">{{ persian_price($product->final_price) }}</span>
                    @if($product->discount_percent)
                        <span class="text-lg text-bronze line-through">{{ persian_number($product->price) }}</span>
                    @endif
                </div>

                {{-- Stock --}}
                <div class="mb-6">
                    @if($product->in_stock)
                        <span class="inline-flex items-center gap-2 text-sm text-green-700">
                            <span class="w-2 h-2 rounded-full bg-green-600"></span>
                            موجود در انبار
                        </span>
                    @else
                        <span class="inline-flex items-center gap-2 text-sm text-bronze">
                            <span class="w-2 h-2 rounded-full bg-bronze"></span>
                            ناموجود
                        </span>
                    @endif
                </div>

                {{-- Description --}}
                <div class="mb-6">
                    <h3 class="text-espresso font-medium mb-2">توضیحات</h3>
                    <p class="text-bronze text-sm leading-relaxed">{{ $product->description ?? 'توضیحات این محصول به‌زودی تکمیل خواهد شد.' }}</p>
                </div>

                {{-- Specifications --}}
                @if($product->specifications)
                <div class="mb-6">
                    <h3 class="text-espresso font-medium mb-2">مشخصات محصول</h3>
                    <div class="text-bronze text-sm leading-relaxed">{!! nl2br(e($product->specifications)) !!}</div>
                </div>
                @endif

                {{-- Add to Cart --}}
                @if($product->in_stock)
                <form action="{{ route('store.cart.add') }}" method="POST" class="flex gap-3 mb-8">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center border border-dust rounded-lg overflow-hidden">
                        <button type="button" onclick="this.nextElementSibling.stepDown()" class="w-10 h-10 flex items-center justify-center hover:bg-sand text-bronze">-</button>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-14 text-center border-0 focus:ring-0" style="border:none;">
                        <button type="button" onclick="this.previousElementSibling.stepUp()" class="w-10 h-10 flex items-center justify-center hover:bg-sand text-bronze">+</button>
                    </div>
                    <button type="submit" class="btn-gold flex-1">
                        افزودن به سبد خرید
                    </button>
                </form>
                @else
                <div class="mb-8">
                    <button disabled class="btn-gold flex-1 w-full opacity-50 cursor-not-allowed">ناموجود</button>
                </div>
                @endif
            </div>
        </div>

        {{-- Related Products --}}
        @if($related->isNotEmpty())
        <section class="mt-16 lg:mt-24">
            <div class="text-center mb-10">
                <h2 class="font-display text-2xl lg:text-3xl text-espresso" style="font-weight: 300;">محصولات مرتبط</h2>
                <div class="w-16 h-px bg-gold mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                @foreach($related as $relatedProduct)
                    @include('store.partials.product-card', ['product' => $relatedProduct])
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>
@endsection
