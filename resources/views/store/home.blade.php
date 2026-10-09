@extends('store.layout')

@section('title', 'نگووید اکسسوریز | زیبایی در جزئیات کوچک')
@section('meta_description', 'فروشگاه آنلاین اکسسوری نگووید - چارم موبایل، آویز کیف، گردنبند و گوشواره‌های ظریف و خاص')

@section('content')
{{-- Hero Section --}}
<section class="relative h-[70vh] min-h-[500px] lg:h-[85vh] overflow-hidden">
    <div class="absolute inset-0 bg-sand">
        <img src="https://images.unsplash.com/photo-1611652022419-a9419f77843b?w=1600&q=80"
             alt="اکسسوری نگووید"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-l from-cream/80 via-cream/30 to-transparent"></div>
    </div>

    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
        <div class="max-w-xl text-right">
            <p class="text-gold text-sm tracking-widest mb-4 fade-in">نگووید اکسسوریز</p>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-7xl text-espresso mb-6 fade-in" style="font-weight: 300; line-height: 1.2;">
                زیبایی، در جزئیات کوچک
            </h1>
            <p class="text-base lg:text-lg text-bronze mb-8 leading-relaxed max-w-md fade-in">
                اکسسوری‌هایی خاص برای استایلی که فقط متعلق به توست.
            </p>
            <a href="{{ route('store.shop') }}" class="btn-gold fade-in">
                مشاهده محصولات
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 scroll-indicator hidden lg:block">
        <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
</section>

{{-- Categories Section --}}
<section class="py-16 lg:py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-gold text-sm tracking-widest mb-2">مجموعه‌ها</p>
            <h2 class="font-display text-3xl lg:text-4xl text-espresso" style="font-weight: 300;">دسته‌بندی محصولات</h2>
            <div class="w-16 h-px bg-gold mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach($categories as $category)
                <a href="{{ route('store.shop', ['category' => $category->slug]) }}" class="card-hover group">
                    <div class="img-zoom aspect-[3/4] rounded-xl overflow-hidden bg-sand relative">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-dust" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.58-4.58A2 2 0 0110 11h4a2 2 0 011.42.58L20 16M6 6h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-espresso/60 to-transparent"></div>
                        <div class="absolute bottom-0 right-0 left-0 p-4 text-center">
                            <h3 class="text-white text-lg font-medium mb-1">{{ $category->name }}</h3>
                            <span class="text-white/80 text-xs group-hover:text-gold transition-colors">مشاهده محصولات ←</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Best Sellers Section --}}
@if($bestsellers->isNotEmpty())
<section class="py-16 lg:py-24 bg-sand/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-gold text-sm tracking-widest mb-2">محبوب‌ترین‌ها</p>
            <h2 class="font-display text-3xl lg:text-4xl text-espresso" style="font-weight: 300;">پرفروش‌ترین‌ها</h2>
            <div class="w-16 h-px bg-gold mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach($bestsellers as $product)
                @include('store.partials.product-card')
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Brand Intro Section --}}
<section class="py-16 lg:py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            <div class="order-2 lg:order-1">
                <p class="text-gold text-sm tracking-widest mb-2">درباره نگووید</p>
                <h2 class="font-display text-3xl lg:text-4xl text-espresso mb-6" style="font-weight: 300;">
                    نگووید؛ ظرافتی برای هر روز
                </h2>
                <p class="text-bronze leading-relaxed mb-8">
                    در نگووید، جزئیات کوچک تفاوت‌های بزرگ می‌سازند. ما اکسسوری‌هایی را انتخاب می‌کنیم که به استایل تو شخصیت می‌بخشند و لحظه‌های روزمره را خاص‌تر می‌کنند.
                </p>

                <div class="space-y-5">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-sand flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-espresso font-medium mb-1">انتخاب‌های خاص و متفاوت</h4>
                            <p class="text-sm text-bronze">هر قطعه با دقت انتخاب شده تا استایل منحصربه‌فردی بسازد.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-sand flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-espresso font-medium mb-1">توجه به جزئیات</h4>
                            <p class="text-sm text-bronze">ظرافت در طراحی و کیفیت، اولویت ماست.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-sand flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <div>
                            <h4 class="text-espresso font-medium mb-1">بسته‌بندی زیبا و مناسب هدیه</h4>
                            <p class="text-sm text-bronze">هر سفارش با بسته‌بندی شیک و لوکس تحویل داده می‌شود.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-sand img-zoom">
                    <img src="https://images.unsplash.com/photo-1599643478518-a784e5dc4c4f?w=800&q=80"
                         alt="فرایند آماده‌سازی اکسسوری نگووید"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- New Arrivals Section --}}
@if($newArrivals->isNotEmpty())
<section class="py-16 lg:py-24 bg-sand/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-gold text-sm tracking-widest mb-2">تازه‌های ما</p>
            <h2 class="font-display text-3xl lg:text-4xl text-espresso" style="font-weight: 300;">تازه‌های نگووید</h2>
            <div class="w-16 h-px bg-gold mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
            @foreach($newArrivals as $product)
                @include('store.partials.product-card')
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('store.shop') }}" class="btn-outline-gold">مشاهده همه محصولات</a>
        </div>
    </div>
</section>
@endif

{{-- Special Offer Banner --}}
<section class="py-16 lg:py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-2xl overflow-hidden bg-gradient-to-l from-sand to-cream border border-dust">
            <div class="px-8 py-16 lg:px-16 lg:py-20 text-center">
                <p class="text-gold text-sm tracking-widest mb-3">پیشنهاد ویژه</p>
                <h2 class="font-display text-3xl lg:text-5xl text-espresso mb-4" style="font-weight: 300;">
                    یک جزئیات کوچک، یک حس متفاوت
                </h2>
                <p class="text-bronze mb-8 max-w-md mx-auto">
                    مدل موردعلاقه‌ات را پیدا کن و استایلت را کامل کن.
                </p>
                <a href="{{ route('store.shop') }}" class="btn-gold">
                    همین حالا انتخاب کن
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Testimonials Section --}}
@if($testimonials->isNotEmpty())
<section class="py-16 lg:py-24 bg-sand/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-gold text-sm tracking-widest mb-2">نظرات</p>
            <h2 class="font-display text-3xl lg:text-4xl text-espresso" style="font-weight: 300;">تجربه خرید مشتریان</h2>
            <div class="w-16 h-px bg-gold mx-auto mt-6"></div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
                <div class="bg-white rounded-xl p-6 border border-dust/40">
                    <div class="flex items-center gap-0.5 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 {{ $i < $testimonial->rating ? 'text-gold' : 'text-dust' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-bronze text-sm leading-relaxed mb-4">«{{ $testimonial->message }}»</p>
                    <p class="text-espresso font-medium text-sm">{{ $testimonial->name }}</p>
                    @if($testimonial->is_test_content)
                        <p class="text-xs text-dust mt-1">(محتوای آزمایشی)</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Newsletter Section --}}
<section class="py-16 lg:py-24 bg-cream">
    <div class="max-w-2xl mx-auto px-4 text-center">
        <p class="text-gold text-sm tracking-widest mb-2">خبرنامه</p>
        <h2 class="font-display text-3xl lg:text-4xl text-espresso mb-4" style="font-weight: 300;">
            از دنیای نگووید باخبر باش
        </h2>
        <p class="text-bronze mb-8">
            برای اطلاع از محصولات جدید و پیشنهادهای ویژه، عضو خبرنامه ما شو.
        </p>

        <form action="{{ route('store.newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
            @csrf
            <input type="email" name="email" placeholder="ایمیل خود را وارد کنید" required class="flex-1" dir="ltr">
            <button type="submit" class="btn-gold whitespace-nowrap">عضویت</button>
        </form>
    </div>
</section>
@endsection
