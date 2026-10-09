<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'نگووید اکسسوریز | زیبایی در جزئیات کوچک')</title>
    <meta name="description" content="@yield('meta_description', 'فروشگاه آنلاین اکسسوری نگووید - چارم موبایل، آویز کیف، گردنبند و گوشواره‌های ظریف و خاص')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-cream: #FDFBF7;
            --color-sand: #F5F0E6;
            --color-gold: #C5A059;
            --color-gold-dark: #A88568;
            --color-espresso: #2A2723;
            --color-bronze: #6D675E;
            --color-dust: #E5D3B3;
            --color-border: #E5D3B3;
        }
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: var(--color-cream);
            color: var(--color-espresso);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }
        .font-display {
            font-family: 'Vazirmatn', serif;
            font-weight: 300;
            letter-spacing: -0.02em;
        }
        .text-gold { color: var(--color-gold); }
        .text-gold-dark { color: var(--color-gold-dark); }
        .text-espresso { color: var(--color-espresso); }
        .text-bronze { color: var(--color-bronze); }
        .bg-cream { background-color: var(--color-cream); }
        .bg-sand { background-color: var(--color-sand); }
        .bg-gold { background-color: var(--color-gold); }
        .bg-gold-dark { background-color: var(--color-gold-dark); }
        .border-gold { border-color: var(--color-gold); }
        .border-dust { border-color: var(--color-dust); }

        .btn-gold {
            background-color: var(--color-gold);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-gold:hover {
            background-color: var(--color-gold-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(197, 160, 89, 0.3);
        }
        .btn-outline-gold {
            border: 1px solid var(--color-gold);
            color: var(--color-gold);
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-outline-gold:hover {
            background-color: var(--color-gold);
            color: white;
        }
        .card-hover {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(197, 160, 89, 0.15);
        }
        .img-zoom { overflow: hidden; }
        .img-zoom img { transition: transform 0.6s ease; }
        .img-zoom:hover img { transform: scale(1.05); }

        .notification-bar {
            background-color: var(--color-sand);
            border-bottom: 1px solid var(--color-dust);
        }
        .header-sticky {
            background-color: rgba(253, 251, 247, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--color-dust);
        }
        .nav-link-store {
            color: var(--color-espresso);
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }
        .nav-link-store:hover { color: var(--color-gold); }
        .nav-link-store::after {
            content: '';
            position: absolute;
            bottom: -4px;
            right: 0;
            width: 0;
            height: 1px;
            background-color: var(--color-gold);
            transition: width 0.3s ease;
        }
        .nav-link-store:hover::after { width: 100%; }

        .badge-new {
            background-color: var(--color-gold);
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
            border-radius: 0.25rem;
            font-weight: 500;
        }
        .badge-sale {
            background-color: #C97B4F;
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
            border-radius: 0.25rem;
            font-weight: 500;
        }
        .badge-bestseller {
            background-color: var(--color-espresso);
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
            border-radius: 0.25rem;
            font-weight: 500;
        }
        .badge-out-of-stock {
            background-color: var(--color-bronze);
            color: white;
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
            border-radius: 0.25rem;
            font-weight: 500;
        }

        input[type="text"], input[type="email"], input[type="tel"], input[type="number"], textarea, select {
            border: 1px solid var(--color-dust);
            border-radius: 0.5rem;
            padding: 0.625rem 1rem;
            background-color: white;
            color: var(--color-espresso);
            font-family: 'Vazirmatn', sans-serif;
            font-size: 0.875rem;
            transition: border-color 0.3s ease;
            width: 100%;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--color-gold);
            box-shadow: 0 0 0 2px rgba(197, 160, 89, 0.15);
        }

        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.open { transform: translateX(0); }

        .fade-in {
            animation: fadeIn 0.8s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .scroll-indicator {
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        .cart-panel {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .cart-panel.open { transform: translateX(0); }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">

    {{-- Notification Bar --}}
    <div class="notification-bar text-center py-2 text-xs text-bronze">
        زیبایی در جزئیات است | تجربه‌ای متفاوت از انتخاب اکسسوری
    </div>

    {{-- Header --}}
    <header class="header-sticky sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                {{-- Mobile menu button --}}
                <button @click="mobileMenuOpen = true" class="lg:hidden text-espresso p-2" aria-label="منو">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                {{-- Logo (right side in RTL) --}}
                <a href="{{ route('store.home') }}" class="flex items-center gap-2 ml-auto lg:ml-0">
                    <div class="flex flex-col items-center leading-none">
                        <span class="text-xl lg:text-2xl font-display tracking-wide text-gold" style="font-weight: 500;">negovid</span>
                        <span class="text-[0.6rem] lg:text-xs tracking-[0.3em] text-gold-dark mt-0.5">ACCESSORIES</span>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden lg:flex items-center gap-7">
                    <a href="{{ route('store.home') }}" class="nav-link-store">صفحه اصلی</a>
                    <a href="{{ route('store.shop') }}" class="nav-link-store">فروشگاه</a>
                    <a href="{{ route('store.shop', ['category' => 'mobile-charm']) }}" class="nav-link-store">چارم موبایل</a>
                    <a href="{{ route('store.shop', ['category' => 'bag-charm']) }}" class="nav-link-store">آویز کیف</a>
                    <a href="{{ route('store.shop', ['category' => 'necklace']) }}" class="nav-link-store">گردنبند</a>
                    <a href="{{ route('store.shop', ['category' => 'earring']) }}" class="nav-link-store">گوشواره</a>
                    <a href="{{ route('store.about') }}" class="nav-link-store">درباره ما</a>
                    <a href="{{ route('store.contact') }}" class="nav-link-store">تماس با ما</a>
                </nav>

                {{-- Icons (left side in RTL) --}}
                <div class="flex items-center gap-3 lg:gap-4">
                    <a href="{{ route('store.track.order') }}" class="text-espresso hover:text-gold transition-colors hidden sm:block" aria-label="پیگیری سفارش">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </a>
                    <a href="{{ route('admin.dashboard.store') }}" class="text-espresso hover:text-gold transition-colors hidden sm:block" aria-label="پنل مدیریت">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </a>
                    <a href="{{ route('store.cart') }}" class="relative text-espresso hover:text-gold transition-colors" aria-label="سبد خرید">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        @php $cartCount = app(\App\Services\CartService::class)->count(); @endphp
                        @if($cartCount > 0)
                            <span class="absolute -top-2 -left-2 bg-gold text-white text-[0.65rem] w-5 h-5 rounded-full flex items-center justify-center font-medium">{{ $cartCount }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Mobile Menu --}}
    <div x-data="{ mobileMenuOpen: false }" x-init="$watch('mobileMenuOpen', v => document.body.style.overflow = v ? 'hidden' : '')" @keydown.escape.window="mobileMenuOpen = false">
        <div x-show="mobileMenuOpen" x-transition.opacity class="fixed inset-0 bg-black/30 z-50 lg:hidden" @click="mobileMenuOpen = false" style="display:none;"></div>
        <div class="mobile-menu fixed top-0 right-0 h-full w-72 bg-cream shadow-xl z-50 lg:hidden overflow-y-auto" :class="{ 'open': mobileMenuOpen }" x-show="mobileMenuOpen" style="display:none;">
            <div class="flex items-center justify-between p-4 border-b border-dust">
                <span class="text-xl font-display text-gold" style="font-weight: 500;">negovid</span>
                <button @click="mobileMenuOpen = false" class="text-espresso p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <nav class="flex flex-col p-4 gap-1">
                <a href="{{ route('store.home') }}" class="py-3 px-4 rounded-lg hover:bg-sand text-espresso font-medium" @click="mobileMenuOpen = false">صفحه اصلی</a>
                <a href="{{ route('store.shop') }}" class="py-3 px-4 rounded-lg hover:bg-sand text-espresso font-medium" @click="mobileMenuOpen = false">فروشگاه</a>
                <a href="{{ route('store.shop', ['category' => 'mobile-charm']) }}" class="py-3 px-4 rounded-lg hover:bg-sand text-bronze" @click="mobileMenuOpen = false">چارم موبایل</a>
                <a href="{{ route('store.shop', ['category' => 'bag-charm']) }}" class="py-3 px-4 rounded-lg hover:bg-sand text-bronze" @click="mobileMenuOpen = false">آویز کیف</a>
                <a href="{{ route('store.shop', ['category' => 'necklace']) }}" class="py-3 px-4 rounded-lg hover:bg-sand text-bronze" @click="mobileMenuOpen = false">گردنبند</a>
                <a href="{{ route('store.shop', ['category' => 'earring']) }}" class="py-3 px-4 rounded-lg hover:bg-sand text-bronze" @click="mobileMenuOpen = false">گوشواره</a>
                <a href="{{ route('store.about') }}" class="py-3 px-4 rounded-lg hover:bg-sand text-espresso font-medium" @click="mobileMenuOpen = false">درباره ما</a>
                <a href="{{ route('store.contact') }}" class="py-3 px-4 rounded-lg hover:bg-sand text-espresso font-medium" @click="mobileMenuOpen = false">تماس با ما</a>
                <a href="{{ route('store.track.order') }}" class="py-3 px-4 rounded-lg hover:bg-sand text-bronze" @click="mobileMenuOpen = false">پیگیری سفارش</a>
                <a href="{{ route('admin.dashboard.store') }}" class="py-3 px-4 rounded-lg hover:bg-sand text-bronze" @click="mobileMenuOpen = false">پنل مدیریت</a>
            </nav>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="fixed top-20 left-1/2 -translate-x-1/2 z-[60] bg-gold text-white px-6 py-3 rounded-lg shadow-lg fade-in text-sm" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="fixed top-20 left-1/2 -translate-x-1/2 z-[60] bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg fade-in text-sm" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
            {{ session('error') }}
        </div>
    @endif
    @if(session('info'))
        <div class="fixed top-20 left-1/2 -translate-x-1/2 z-[60] bg-espresso text-white px-6 py-3 rounded-lg shadow-lg fade-in text-sm" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)">
            {{ session('info') }}
        </div>
    @endif

    {{-- Main Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('store.partials.footer')

    @livewireScripts
    @stack('scripts')
</body>
</html>
