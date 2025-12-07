<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="{{ asset('assets/site/main.css') }}" rel="stylesheet">
<style>
.nav-item-circle {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #333;
    font-size: 13px;
    font-weight: 600;
    transition: color 0.3s ease;
}

.nav-item-circle i {
    width: 50px !important;
    height: 50px !important;
    border-radius: 50% !important;
    background: linear-gradient(135deg, #6351a7 0%, #362280 100%);
    color: white;
    display: flex !important;
    align-items: center;
    justify-content: center;
    margin-bottom: 5px;
    font-size: 18px;
    transition: all 0.3s ease;
}

.nav-item-circle:hover i {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
}

.nav-item-circle:hover {
    color: #362280;
}
.header {
    background: #ffffff;
    box-shadow: 0 2px 12px rgba(99, 81, 167, 0.1);

    position: sticky;
    top: 0;
    z-index: 1000;
}
.header::after {
    content: "";
    display: block;
    height: 4px;
    background: #6f42c1;
    width: 100%;
}
 @font-face {
        font-family: 'Vazir';
        src: url("{{ asset('assets/panel/css/Vazir/Vazir.woff2') }}") format('woff2'),
             url("{{ asset('assets/panel/css/Vazir/Vazir.woff') }}") format('woff');
        font-weight: normal;
        font-style: normal;
    }

    body {
        font-family: 'Vazir', sans-serif;
    }
</style>

    @livewireStyles
</head>

<body>

     @include('basic.other.header')

    {{ $slot }}

    <script src="{{ asset('assets/panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    @livewireScripts
</body>
</html>
