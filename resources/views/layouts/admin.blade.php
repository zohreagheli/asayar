<!doctype html>
<html lang="fa-IR" dir="rtl">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- TITLE -->
    <title>آسایار</title>

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- jQuery -->
    <script src="{{ asset('assets/panel/js/jquery.min.js') }}"></script>

    <!-- Persian Date & Datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link id="style" href="{{ asset('assets/panel/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/panel/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- FONT-ICONS CSS -->
    <link href="{{ asset('assets/panel/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" href="{{ asset('assets/panel/colors/color1.css') }}" />

    <!-- RTL STYLE -->
    <link href="{{ asset('assets/panel/css/rtl.css') }}" rel="stylesheet" />

    <!-- Toastify -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    @stack('styles')

    <!-- Custom inline styles -->
    <style>
        .app-sidebar {
            background: linear-gradient(180deg, #0b1736, #1e0f4b);
            color: #fff;
            width: 250px;
            min-height: 100vh;
            border-left: 4px solid #4f46e5;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .side-header {
            background: rgba(255, 255, 255, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .side-header img {
            max-height: 50px;
        }

        .side-menu__item {
            color: #d1d5db;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            font-size: 15px;
            border-radius: 8px;
            margin: 4px 10px;
            transition: all 0.3s ease;
        }

        .side-menu__item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateX(5px);
        }

        .side-menu__item.active {
            background: linear-gradient(90deg, #4338ca, #7e22ce);
            color: #fff;
            box-shadow: 0 0 10px rgba(126, 34, 206, 0.4);
        }

        .app-header {
            background: linear-gradient(180deg, #0b1736, #1e0f4b);
            color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            padding: 0 20px;
        }

        .header-right-icons .nav-link.icon {
            color: #d1d5db;
            font-size: 18px;
            margin-left: 15px;
            transition: all 0.3s ease;
        }

        .header-right-icons .nav-link.icon:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        .profile-1 .dropdown-menu {
            background: rgba(11, 23, 54, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            min-width: 200px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .profile-1 .dropdown-menu .dropdown-item {
            color: #d1d5db;
            transition: all 0.3s ease;
        }

        .profile-1 .dropdown-menu .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .header-search .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .header-search .input-group-text.btn {
            background: #4f46e5;
            color: #fff;
            border: none;
        }
    </style>
</head>

<body class="app sidebar-mini rtl light-mode">

    <div class="page">
        <div class="page-main">

            <!-- Header -->
            @include('admin.layout.header')

            <!-- Sidebar -->
            @include('admin.layout.sidebar')

            <!-- Content -->
            <main class="p-4">
                {{ $slot }}
            </main>

            <!-- BACK-TO-TOP -->
            <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Sidebar & Custom JS -->
    <script src="{{ asset('assets/panel/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/panel/plugins/sidemenu/sidemenu.js') }}"></script>
    <script src="{{ asset('assets/panel/js/custom.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Toastify -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @stack('scripts')
</body>

</html>
