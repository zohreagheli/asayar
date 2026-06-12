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



    <link id="style" href="{{ asset('assets/panel/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/panel/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/css/skin-modes.css') }}" rel="stylesheet" />

    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- FONT-ICONS CSS -->
    <link href="{{ asset('assets/panel/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" href="{{ asset('assets/panel/colors/color1.css') }}" />

    <!-- RTL STYLE -->
    <link href="{{ asset('assets/panel/css/rtl.css') }}" rel="stylesheet" />



    @stack('styles')

    <!-- Custom inline styles -->

</head>

<body class="app sidebar-mini rtl light-mode">

    <div class="page">
        <div class="page-main">

            <!-- Header -->
            @include('admin.layout.header')

            <!-- Sidebar -->
            @include('admin.layout.sidebar')

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

                        @endif
                         {{ $slot }}
                    </div>
                </div>
            </main>
            <!-- BACK-TO-TOP -->
            <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script>
window.bootstrap = bootstrap;
</script>
    <!-- Sidebar & Custom JS -->
    <script src="{{ asset('assets/panel/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/panel/plugins/sidemenu/sidemenu.js') }}"></script>
    <script src="{{ asset('assets/panel/js/custom.js') }}"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Toastify -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
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
<script>
document.addEventListener('livewire:init', () => {

    Livewire.on('open-modal', () => {
        new bootstrap.Modal(
            document.getElementById('technicianModal')
        ).show();
    });

    Livewire.on('close-modal', () => {
        let el = document.getElementById('technicianModal');
        let modal = bootstrap.Modal.getInstance(el);
        if (modal) modal.hide();
    });

});
</script>

    @stack('scripts')
</body>

</html>
