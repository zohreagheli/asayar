@extends('store.layout')

@section('title', 'فروشگاه | نگووید اکسسوریز')
@section('meta_description', 'خرید آنلاین چارم موبایل، آویز کیف، گردنبند و گوشواره از نگووید اکسسوریز')

@section('content')
<div class="bg-cream">
    {{-- Page Header --}}
    <div class="bg-sand/50 py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-display text-3xl lg:text-4xl text-espresso mb-2" style="font-weight: 300;">فروشگاه</h1>
            <div class="flex items-center justify-center gap-2 text-sm text-bronze">
                <a href="{{ route('store.home') }}" class="hover:text-gold transition-colors">خانه</a>
                <span>/</span>
                <span class="text-espresso">فروشگاه</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Filters Sidebar (Desktop) --}}
            <aside class="hidden lg:block w-64 flex-shrink-0">
                <div class="sticky top-28">
                    <form action="{{ route('store.shop') }}" method="GET" id="filter-form">
                        <div class="mb-6">
                            <h3 class="text-espresso font-medium mb-3 pb-2 border-b border-dust">جست‌وجو</h3>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="نام محصول..." class="w-full">
                        </div>

                        <div class="mb-6">
                            <h3 class="text-espresso font-medium mb-3 pb-2 border-b border-dust">دسته‌بندی</h3>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="category" value="" @if(!request('category')) checked @endif class="text-gold focus:ring-gold" onchange="document.getElementById('filter-form').submit()">
                                    <span class="text-sm text-bronze">همه محصولات</span>
                                </label>
                                @foreach($categories as $cat)
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="category" value="{{ $cat->slug }}" @if(request('category') === $cat->slug) checked @endif class="text-gold focus:ring-gold" onchange="document.getElementById('filter-form').submit()">
                                        <span class="text-sm text-bronze">{{ $cat->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-espresso font-medium mb-3 pb-2 border-b border-dust">بازه قیمت</h3>
                            <div class="flex gap-2 items-center">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="از" class="w-full text-xs">
                                <span class="text-bronze">-</span>
                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="تا" class="w-full text-xs">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="in_stock" value="1" @if(request('in_stock')) checked @endif class="text-gold focus:ring-gold" onchange="document.getElementById('filter-form').submit()">
                                <span class="text-sm text-bronze">فقط موجودها</span>
                            </label>
                        </div>

                        <button type="submit" class="btn-gold w-full text-sm">اعمال فیلترها</button>
                        <a href="{{ route('store.shop') }}" class="block text-center text-sm text-bronze hover:text-gold mt-3">حذف فیلترها</a>
                    </form>
                </div>
            </aside>

            {{-- Products Grid --}}
            <div class="flex-1">
                {{-- Sort & Mobile Filter Toggle --}}
                <div class="flex items-center justify-between mb-6 gap-4">
                    <div class="flex items-center gap-3">
                        <button @click="filterOpen = !filterOpen" class="lg:hidden btn-outline-gold text-sm py-2 px-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 4h18M6 12h12M10 20h4"/></svg>
                            فیلترها
                        </button>
                        <p class="text-sm text-bronze hidden sm:block">{{ persian_number($products->total()) }} محصول</p>
                    </div>

                    <select name="sort" form="filter-form" onchange="document.getElementById('filter-form').submit()" class="w-auto">
                        <option value="newest" @if(request('sort', 'newest') === 'newest') selected @endif>جدیدترین</option>
                        <option value="price_low" @if(request('sort') === 'price_low') selected @endif>ارزان‌ترین</option>
                        <option value="price_high" @if(request('sort') === 'price_high') selected @endif>گران‌ترین</option>
                    </select>
                </div>

                {{-- Mobile Filters --}}
                <div x-data="{ filterOpen: false }" x-show="filterOpen" x-transition class="lg:hidden mb-6 bg-sand/50 rounded-xl p-4" style="display:none;">
                    <div class="mb-4">
                        <input type="text" name="search" form="filter-form" value="{{ request('search') }}" placeholder="جست‌وجو محصول..." class="w-full">
                    </div>
                    <div class="mb-4">
                        <h3 class="text-espresso text-sm font-medium mb-2">دسته‌بندی</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <label class="flex items-center gap-2 text-sm">
                                <input type="radio" name="category" value="" form="filter-form" @if(!request('category')) checked @endif onchange="document.getElementById('filter-form').submit()">
                                <span class="text-bronze">همه</span>
                            </label>
                            @foreach($categories as $cat)
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="category" value="{{ $cat->slug }}" form="filter-form" @if(request('category') === $cat->slug) checked @endif onchange="document.getElementById('filter-form').submit()">
                                    <span class="text-bronze">{{ $cat->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-espresso text-sm font-medium mb-2">بازه قیمت</h3>
                        <div class="flex gap-2">
                            <input type="number" name="min_price" form="filter-form" value="{{ request('min_price') }}" placeholder="از" class="text-xs">
                            <input type="number" name="max_price" form="filter-form" value="{{ request('max_price') }}" placeholder="تا" class="text-xs">
                        </div>
                    </div>
                    <label class="flex items-center gap-2 mb-4 text-sm">
                        <input type="checkbox" name="in_stock" value="1" form="filter-form" @if(request('in_stock')) checked @endif onchange="document.getElementById('filter-form').submit()">
                        <span class="text-bronze">فقط موجودها</span>
                    </label>
                    <button type="submit" form="filter-form" class="btn-gold w-full text-sm">اعمال فیلترها</button>
                </div>

                {{-- Products --}}
                @if($products->isEmpty())
                    <div class="text-center py-20">
                        <p class="text-bronze mb-4">محصولی با این مشخصات یافت نشد.</p>
                        <a href="{{ route('store.shop') }}" class="btn-outline-gold text-sm">نمایش همه محصولات</a>
                    </div>
                @else
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                        @foreach($products as $product)
                            @include('store.partials.product-card')
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-10">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
