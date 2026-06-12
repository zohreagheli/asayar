<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="{{ asset('assets/site/main.css') }}" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


<style>
    /* =========================
   THEME PURPLE
========================= */

:root{
    --theme-primary: #6351a7;
    --theme-primary-dark: #362280;
}

/* لینک‌ها */
a{
    color: var(--theme-primary);
}

a:hover{
    color: var(--theme-primary-dark);
}

/* Breadcrumb */
.breadcrumb-item a{
    color: var(--theme-primary) !important;
    text-decoration: none;
    font-weight: 600;
}

.breadcrumb-item.active{
    color: #6c757d !important;
}

/* عنوان صفحات */
.page-title{
    color: var(--theme-primary);
    font-weight: 700;
}

/* دکمه‌های اصلی */
.btn-primary{
    background: linear-gradient(
        135deg,
        var(--theme-primary),
        var(--theme-primary-dark)
    ) !important;

    border: none !important;
}

.btn-primary:hover{
    opacity: .95;
}

/* رنگ‌های primary بوت استرپ */
.text-primary{
    color: var(--theme-primary) !important;
}

.bg-primary{
    background: linear-gradient(
        135deg,
        var(--theme-primary),
        var(--theme-primary-dark)
    ) !important;
}

.border-primary{
    border-color: var(--theme-primary) !important;
}

/* Pagination */
.pagination .page-link{
    color: var(--theme-primary);
}

.pagination .page-item.active .page-link{
    background: linear-gradient(
        135deg,
        var(--theme-primary),
        var(--theme-primary-dark)
    );

    border-color: var(--theme-primary);
    color:#fff;
}

.pagination .page-link:focus{
    box-shadow:none;
}

/* Input Focus */
.form-control:focus,
.form-select:focus{
    border-color: var(--theme-primary);
    box-shadow:
        0 0 0 .15rem rgba(99,81,167,.15);
}

/* Spinner */
.spinner-border{
    color: var(--theme-primary) !important;
}

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

   <main>
                <div class="app-content ">
                    <div class="container-fluid">
                        @if (isset($pageTitle))

                            <div class="row justify-content-center">

                                <div class="col-xl-10 col-lg-11">

                                    <div class="page-header d-block mb-4 mt-4">

                                        <div>
                                            <h5 class="page-title">
                                                {{ $pageTitle }}
                                            </h5>
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

    <script src="{{ asset('assets/panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

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
