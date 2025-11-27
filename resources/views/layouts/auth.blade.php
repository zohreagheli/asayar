<!doctype html>
<html lang="fa-IR" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>اعتبارسنجی</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/panel/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/panel/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/panel/css/rtl.css') }}" rel="stylesheet" />

    <!-- FONT ICONS -->
    <link href="{{ asset('assets/panel/css/icons.css') }}" rel="stylesheet" />
   
    @livewireStyles
</head>
<body class="app-auth">

    {{ $slot }}

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/panel/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    @livewireScripts
</body>
</html>
