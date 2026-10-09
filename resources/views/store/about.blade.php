@extends('store.layout')

@section('title', 'درباره ما | نگووید اکسسوریز')
@section('meta_description', 'درباره برند نگووید اکسسوریز')

@section('content')
<div class="bg-cream">
    {{-- Hero --}}
    <div class="bg-sand/50 py-16 lg:py-24">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <div class="flex flex-col items-center mb-6">
                <span class="text-3xl font-display text-gold" style="font-weight: 500;">negovid</span>
                <span class="text-sm tracking-[0.3em] text-gold-dark mt-1">ACCESSORIES</span>
            </div>
            <h1 class="font-display text-4xl lg:text-5xl text-espresso mb-4" style="font-weight: 300;">
                نگووید؛ ظرافتی برای هر روز
            </h1>
            <div class="w-16 h-px bg-gold mx-auto mt-6"></div>
        </div>
    </div>

    {{-- Story --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            <div>
                <p class="text-bronze leading-relaxed mb-6">
                    در نگووید، جزئیات کوچک تفاوت‌های بزرگ می‌سازند. ما اکسسوری‌هایی را انتخاب می‌کنیم که به استایل تو شخصیت می‌بخشند و لحظه‌های روزمره را خاص‌تر می‌کنند.
                </p>
                <p class="text-bronze leading-relaxed mb-6">
                    هدف ما این است که هر فرد بتواند با یک جزئیات کوچک، حس متفاوتی از استایل خود بسازد. چارم موبایلی که لبخند به لب می‌آورد، آویز کیفی که توجه‌ها را جلب می‌کند، گردنبندی که ظرافت را به اوج می‌رساند و گوشواره‌ای که هر چهره‌ای را زیباتر می‌کند.
                </p>
                <p class="text-bronze leading-relaxed">
                    ما در نگووید باور داریم که زیبایی در جزئیات است و هر انتخاب کوچک می‌تواند لحظه‌ای خاص بسازد.
                </p>
            </div>
            <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-sand img-zoom">
                <img src="https://images.unsplash.com/photo-1611652022419-a9419f77843b?w=800&q=80" alt="نگووید اکسسوریز" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    {{-- Features --}}
    <div class="bg-sand/50 py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full bg-cream flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <h3 class="text-espresso font-medium mb-2">انتخاب‌های خاص و متفاوت</h3>
                    <p class="text-sm text-bronze">هر قطعه با دقت انتخاب شده تا استایل منحصربه‌فردی بسازد.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full bg-cream flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    </div>
                    <h3 class="text-espresso font-medium mb-2">توجه به جزئیات</h3>
                    <p class="text-sm text-bronze">ظرافت در طراحی و کیفیت، اولویت ماست.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 rounded-full bg-cream flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <h3 class="text-espresso font-medium mb-2">بسته‌بندی زیبا و مناسب هدیه</h3>
                    <p class="text-sm text-bronze">هر سفارش با بسته‌بندی شیک و لوکس تحویل داده می‌شود.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Newsletter --}}
    <section class="py-16 lg:py-24 bg-cream">
        <div class="max-w-2xl mx-auto px-4 text-center">
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
</div>
@endsection
