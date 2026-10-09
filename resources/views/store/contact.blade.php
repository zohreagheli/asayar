@extends('store.layout')

@section('title', 'تماس با ما | نگووید اکسسوریز')
@section('meta_description', 'راه‌های ارتباطی با فروشگاه نگووید اکسسوریز')

@section('content')
<div class="bg-cream">
    <div class="bg-sand/50 py-16 lg:py-24">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h1 class="font-display text-4xl lg:text-5xl text-espresso mb-4" style="font-weight: 300;">تماس با ما</h1>
            <p class="text-bronze">برای هر سؤال یا پیشنهاد، با ما در ارتباط باشید.</p>
            <div class="w-16 h-px bg-gold mx-auto mt-6"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16">
            {{-- Contact Info --}}
            <div>
                <h2 class="text-lg font-medium text-espresso mb-6 pb-2 border-b border-dust">اطلاعات تماس</h2>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-sand flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-espresso font-medium mb-1">تلفن تماس</h3>
                            <p class="text-sm text-bronze" dir="ltr">تکمیل خواهد شد</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-sand flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-espresso font-medium mb-1">ایمیل</h3>
                            <p class="text-sm text-bronze" dir="ltr">تکمیل خواهد شد</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-sand flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-espresso font-medium mb-1">نشانی</h3>
                            <p class="text-sm text-bronze">تکمیل خواهد شد</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-espresso font-medium mb-4">ما را دنبال کنید</h3>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 rounded-full border border-dust flex items-center justify-center hover:border-gold hover:text-gold transition-colors text-bronze" aria-label="اینستاگرام">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.265-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-dust flex items-center justify-center hover:border-gold hover:text-gold transition-colors text-bronze" aria-label="تلگرام">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 000 12a12 12 0 0012 12 12 12 0 0012-12A12 12 0 0012 0a12 12 0 00-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 01.171.325c.016.092.032.292.016.452-.18 1.895-.962 6.492-1.36 8.622-.168.9-.499 1.201-.82 1.231-.696.064-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.026-.217.324-.439.893-.665 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div>
                <h2 class="text-lg font-medium text-espresso mb-6 pb-2 border-b border-dust">پیام شما</h2>
                <p class="text-sm text-bronze mb-6">
                    اطلاعات تماس، نشانی و راه‌های ارتباطی پس از دریافت اطلاعات فروشگاه توسط مدیر قابل تکمیل خواهد بود.
                </p>
                <div class="bg-sand/50 rounded-xl p-6 text-center">
                    <svg class="w-12 h-12 text-dust mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <p class="text-bronze text-sm">فرم تماس به‌زودی فعال خواهد شد.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
