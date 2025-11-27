<!doctype html>
<html lang="fa-IR" dir="rtl">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – الگوی مدیریت و داشبورد بوت استرپ 5">
    <meta name="author" content="limoostudio">
    <meta name="keywords" content="ادمین,داشبورد ادمین,پنل ادمین,قالب مدیریت,بوت استرپ,کلین,داشبورد,فلت,جیکوئری,مدرن,ریسپانسیو,قالب ادمین حرفه ای,داشبورد ریسپانسیو,رابط کاربری,کیت رابط کاربری.">

    <!-- FAVICON
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}">-->

    <!-- TITLE -->
    <title>آسایار</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/panel/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/panel/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/panel/css/dark-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/panel/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/panel/css/skin-modes.css') }}" rel="stylesheet">

    <!-- FONT-ICONS CSS -->
    <link href="{{ asset('assets/panel/css/icons.css') }}" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/panel/colors/color1.css') }}">
    <link href="{{ asset('assets/panel/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/panel/switcher/demo.css') }}" rel="stylesheet">

    <!-- RTL STYLE -->
    <link rel="stylesheet" id="fonts" href="">
    <link href="{{ asset('assets/panel/css/rtl.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Optional scripts (غیرفعال) -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-rtl"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    -->

    @livewireStyles
</head>

<body class="app sidebar-mini sidebar-collapse
 rtl light-mode">
    <!-- GLOBAL-LOADER
    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
   GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('basic.layout.header')
            <!-- /app-Header -->

            <!-- APP-SIDEBAR -->
            @include('basic.layout.sidebar-right')
            <!-- /APP-SIDEBAR -->

            <!-- MAIN CONTENT -->
            @yield('content')
            <!-- /MAIN CONTENT -->

            <!-- FOOTER -->
            @include('basic.layout.footer')
            <!-- /FOOTER -->

            <!-- BACK-TO-TOP -->
            <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

            @livewireScripts

            <!-- JQUERY JS -->
            <script src="{{ asset('assets/panel/js/jquery.min.js') }}"></script>

            <!-- BOOTSTRAP JS -->
            <script src="{{ asset('assets/panel/plugins/bootstrap/js/popper.min.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

            <!-- SPARKLINE JS -->
            <script src="{{ asset('assets/panel/js/jquery.sparkline.min.js') }}"></script>

            <!-- Sticky JS -->
            <script src="{{ asset('assets/panel/js/sticky.js') }}"></script>

            <!-- CHART-CIRCLE JS -->
            <script src="{{ asset('assets/panel/js/circle-progress.min.js') }}"></script>

            <!-- PEITY CHART JS -->
            <script src="{{ asset('assets/panel/plugins/peitychart/jquery.peity.min.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/peitychart/peitychart.init.js') }}"></script>

            <!-- SIDEBAR JS -->
            <script src="{{ asset('assets/panel/plugins/sidebar/sidebar.js') }}"></script>

            <!-- CHART JS -->
            <script src="{{ asset('assets/panel/plugins/chart/Chart.bundle.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/chart/rounded-barchart.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/chart/utils.js') }}"></script>

            <!-- SELECT2 JS -->
            <script src="{{ asset('assets/panel/plugins/select2/select2.full.min.js') }}"></script>

            <!-- DATATABLE JS -->
            <script src="{{ asset('assets/panel/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/datatable/dataTables.responsive.min.js') }}"></script>

            <!-- APEXCHART JS -->
            <script src="{{ asset('assets/panel/js/apexcharts.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/apexchart/irregular-data-series.js') }}"></script>

            <!-- VECTOR JS -->
            <script src="{{ asset('assets/panel/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
            <script src="{{ asset('assets/panel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

            <!-- SIDE-MENU JS -->
            <script src="{{ asset('assets/panel/plugins/sidemenu/sidemenu.js') }}"></script>

            <!-- TYPEHEAD JS -->
            <script src="{{ asset('assets/panel/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>

            <!-- THEME JS -->
            <script src="{{ asset('assets/panel/js/themeColors.js') }}"></script>

            <!-- CUSTOM JS -->
            <script src="{{ asset('assets/panel/js/custom.js') }}"></script>
            <script src="{{ asset('assets/panel/js/custom1.js') }}"></script>

            <!-- SWITCHER JS
            <script src="{{ asset('assets/panel/switcher/js/switcher.js') }}"></script>-->

            @stack('scripts')
        </div> <!-- end .page-main -->
    </div> <!-- end .page -->

</body>
</html>
