<!doctype html>
<html lang="fa-IR" dir="rtl">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>آسایار</title>

    <!-- jQuery -->
    <script src="{{ asset('assets/panel/js/jquery.min.js') }}"></script>

    <!-- Persian Date & Datepicker -->
    <link rel="stylesheet" href="{{ asset('libs/datepicker/jalalidatepicker.min.css') }}">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/panel/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/panel/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/panel/css/skin-modes.css') }}" rel="stylesheet" />
    @stack('styles')
    <!-- FONT-ICONS CSS -->
    <link href="{{ asset('assets/panel/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" href="{{ asset('assets/panel/colors/color1.css') }}" />

    <!-- RTL STYLE -->
    <link href="{{ asset('assets/panel/css/rtl.css') }}" rel="stylesheet" />

    <!-- Toastify -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @livewireStyles
</head>

<body class="app sidebar-mini sidebar-collapse
 rtl light-mode">

    <div class="page">
        <div class="page-main">

            <!-- Header -->
            @include('basic.layout.header')

            <!-- GLOBAL-LOADER
            <div id="global-loader">
                <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
            </div>-->

            <!-- Sidebar -->
            @include('basic.layout.sidebar-right')

            <!-- MAIN CONTENT -->
            <main>
                <div class="app-content">
                    <div class="container-fluid">
                        @if (isset($pageTitle))

                            <div class="row justify-content-center">

                                <div class="col-xl-10 col-lg-11">

                                    <div class="page-header d-block mb-4">

                                        <div>
                                            <h1 class="page-title">
                                                {{ $pageTitle }}
                                            </h1>
                                        </div>

                                        @if (isset($breadcrumbs))
                                            <div>
                                                <ol class="breadcrumb">

                                                    @foreach ($breadcrumbs as $item)
                                                        @if ($loop->last)
                                                            <li class="breadcrumb-item active">
                                                                {{ $item['title'] }}
                                                            </li>
                                                        @else
                                                            <li class="breadcrumb-item">
                                                                <a href="{{ $item['url'] }}">
                                                                    {{ $item['title'] }}
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach

                                                </ol>
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        @endif {{ $slot }}
                    </div>
                </div>
            </main>
            <!-- BACK-TO-TOP -->


        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- فقط اسکریپت‌های ضروری -->
    <script src="{{ asset('assets/panel/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/panel/plugins/sidemenu/sidemenu.js') }}"></script>
    <script src="{{ asset('assets/panel/js/custom.js') }}"></script>

    @livewireScripts

    <!-- Toastify -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
    document.addEventListener('livewire:init', () => {

        Livewire.on('show-toast', (event) => {

            Toastify({
                text: event.message,
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: event.type === 'success' ? "green" : "red",
            }).showToast();

        });

    });
</script>
    @stack('js')

</body>

</html>
