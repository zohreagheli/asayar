<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'پنل مدیریت | نگووید اکسسوریز')</title>

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
        }
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: var(--color-cream);
            color: var(--color-espresso);
        }
        .admin-sidebar {
            background-color: var(--color-espresso);
        }
        .admin-link {
            color: rgba(253, 251, 247, 0.7);
            transition: all 0.3s ease;
        }
        .admin-link:hover, .admin-link.active {
            color: var(--color-gold);
            background-color: rgba(197, 160, 89, 0.1);
        }
        .btn-admin {
            background-color: var(--color-gold);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }
        .btn-admin:hover {
            background-color: var(--color-gold-dark);
        }
        .btn-admin-danger {
            background-color: #dc2626;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }
        .btn-admin-danger:hover {
            background-color: #b91c1c;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="number"], input[type="password"], textarea, select {
            border: 1px solid var(--color-dust);
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            background-color: white;
            color: var(--color-espresso);
            font-family: 'Vazirmatn', sans-serif;
            font-size: 0.875rem;
            width: 100%;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--color-gold);
            box-shadow: 0 0 0 2px rgba(197, 160, 89, 0.15);
        }
        .card {
            background-color: white;
            border: 1px solid var(--color-dust);
            border-radius: 0.75rem;
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="admin-sidebar w-60 flex-shrink-0 hidden lg:block fixed h-full right-0 top-0 z-40 overflow-y-auto">
            <div class="p-6 text-center border-b border-cream/10">
                <span class="text-xl font-display text-gold" style="font-weight: 500;">negovid</span>
                <span class="block text-xs tracking-[0.3em] text-gold-dark mt-1">ACCESSORIES</span>
            </div>
            <nav class="p-3 space-y-1">
                <a href="{{ route('admin.dashboard.store') }}" class="admin-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm @if(request()->routeIs('admin.dashboard*')) active @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    داشبورد
                </a>
                <a href="{{ route('admin.products') }}" class="admin-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm @if(request()->routeIs('admin.products*')) active @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    محصولات
                </a>
                <a href="{{ route('admin.categories') }}" class="admin-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm @if(request()->routeIs('admin.categories*')) active @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    دسته‌بندی‌ها
                </a>
                <a href="{{ route('admin.orders') }}" class="admin-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm @if(request()->routeIs('admin.orders*')) active @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    سفارش‌ها
                </a>
                <a href="{{ route('admin.newsletter') }}" class="admin-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm @if(request()->routeIs('admin.newsletter*')) active @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    خبرنامه
                </a>
                <a href="{{ route('admin.testimonials') }}" class="admin-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm @if(request()->routeIs('admin.testimonials*')) active @endif">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    نظرات
                </a>
                <div class="pt-4 mt-4 border-t border-cream/10">
                    <a href="{{ route('store.home') }}" class="admin-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        بازگشت به فروشگاه
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="admin-link w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            خروج
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 lg:mr-60">
            {{-- Mobile header --}}
            <header class="bg-white border-b border-dust p-4 lg:hidden flex items-center justify-between sticky top-0 z-30">
                <span class="text-lg font-display text-gold" style="font-weight: 500;">negovid</span>
                <select onchange="window.location.href = this.value" class="w-auto text-sm">
                    <option value="{{ route('admin.dashboard.store') }}">داشبورد</option>
                    <option value="{{ route('admin.products') }}">محصولات</option>
                    <option value="{{ route('admin.categories') }}">دسته‌بندی‌ها</option>
                    <option value="{{ route('admin.orders') }}">سفارش‌ها</option>
                    <option value="{{ route('admin.newsletter') }}">خبرنامه</option>
                    <option value="{{ route('admin.testimonials') }}">نظرات</option>
                    <option value="{{ route('store.home') }}">بازگشت به فروشگاه</option>
                </select>
            </header>

            <main class="p-4 lg:p-8">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-3 mb-4 text-sm">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-3 mb-4 text-sm">{{ session('error') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
