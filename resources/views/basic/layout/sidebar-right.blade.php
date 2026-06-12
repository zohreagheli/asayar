<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header"style="display: flex; align-items: center;justify-content:center; padding: 10px 15px;">
            <a href="{{ route('home.page') }}">
                <img src="{{ asset('assets/image/logo-206.png') }}" class="" alt="logo">
            </a>

        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>

            <ul class="side-menu">
                <li class="sub-category">
                    <h3></h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('home.page') }}"><i
                            class="side-menu__icon fe fe-home"></i><span class ="side-menu__label">صفحه اصلی</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard') }}"
                        style="display: flex; align-items: center; gap: 8px;"> <i class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 18 14">
                                <g fill="none">
                                    <!-- مسیرهای اصلی با stroke (دور) و بدون fill (توپر) -->
                                    <path stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M.891 12.599c.062.306.525.552 1.1.586a22 22 0 0 0 1.315.047a22 22 0 0 0 1.315-.047c.576-.034 1.04-.28 1.1-.586c.046-.226.085-.459.085-.695a3.6 3.6 0 0 0-.084-.695c-.062-.306-.525-.552-1.101-.586a22 22 0 0 0-1.315-.047a22 22 0 0 0-1.314.047c-.576.034-1.04.28-1.101.586a3.5 3.5 0 0 0-.084.695c0 .237.038.469.084.695M13.13 1.438c-.061-.306-.526-.552-1.103-.586A22 22 0 0 0 10.71.805c-.449 0-.889.022-1.318.047c-.577.034-1.041.28-1.103.586a3.5 3.5 0 0 0-.084.695c0 .236.039.469.084.695c.062.306.526.552 1.103.586c.43.025.87.047 1.318.047s.889-.022 1.317-.047c.578-.034 1.042-.28 1.104-.587a3.6 3.6 0 0 0 .084-.694a3.6 3.6 0 0 0-.084-.695" />
                                    <path stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M.891 6.402c.062.847.525 1.529 1.1 1.623c.428.07.868.13 1.315.13c.448 0 .887-.06 1.315-.13c.576-.094 1.04-.776 1.1-1.623a26 26 0 0 0 .085-1.922c0-.654-.039-1.297-.084-1.922C5.66 1.711 5.197 1.03 4.62.935a8 8 0 0 0-1.315-.13c-.447 0-.887.06-1.314.13c-.576.095-1.04.776-1.101 1.623A26 26 0 0 0 .807 4.48c0 .655.038 1.297.084 1.922M13.13 7.638c-.061-.846-.526-1.527-1.103-1.621a8 8 0 0 0-1.317-.13c-.449 0-.889.06-1.318.13c-.577.094-1.041.775-1.103 1.621a26 26 0 0 0-.084 1.921c0 .654.039 1.296.084 1.921c.062.847.526 1.528 1.103 1.622c.43.07.87.13 1.318.13s.889-.06 1.317-.13c.578-.094 1.042-.775 1.104-1.622c.045-.625.084-1.267.084-1.92c0-.655-.039-1.297-.084-1.922" />
                                </g>
                            </svg></i><span class="side-menu__label"
                            style="padding-left: 8px !important">داشبورد</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"
                        style="display: flex; align-items: center; gap: 8px;"><i class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="m29.338 17.934l-7.732-2.779l-3.232-4.058A2.99 2.99 0 0 0 16.054 10H8.058a3 3 0 0 0-2.48 1.312l-2.712 3.983A5 5 0 0 0 2 18.107V26a1 1 0 0 0 1 1h2.142a3.98 3.98 0 0 0 7.716 0h6.284a3.98 3.98 0 0 0 7.716 0H29a1 1 0 0 0 1-1v-7.125a1 1 0 0 0-.662-.941M9 28a2 2 0 1 1 2-2a2.003 2.003 0 0 1-2 2m14 0a2 2 0 1 1 2-2a2.003 2.003 0 0 1-2 2m5-3h-1.142a3.98 3.98 0 0 0-7.716 0h-6.284a3.98 3.98 0 0 0-7.716 0H4v-6.893a3 3 0 0 1 .52-1.688l2.711-3.981A1 1 0 0 1 8.058 12h7.996a1 1 0 0 1 .764.355l3.4 4.268a1 1 0 0 0 .444.318L28 19.578zM24.555 6a2 2 0 0 1 2-2H30a3.976 3.976 0 0 0-7.304 1H16v2h6.696A3.976 3.976 0 0 0 30 8h-3.445a2 2 0 0 1-2-2" />
                            </svg></i><span class="side-menu__label">سرویس ها</span><i
                            class="angle fe fe-chevron-right"></i></a>

                    <ul class="slide-menu mega-slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <div class="mega-menu">
                            <div class="">
                                <ul>
                                    <li><a href="{{ route('appointments.create') }}" class="slide-item">ثبت سرویس
                                            جدید</a></li>
                                    <li><a href="{{ route('appointments.index') }}" class="slide-item"> سرویس های ثبت
                                            شده</a></li>
                                </ul>
                            </div>



                        </div>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">پشتیبانی</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('tickets.create') }}" class="slide-item"> ثبت تیکت جدید</a></li>
                        <li><a href="{{ route('tickets.list') }}" class="slide-item"> سوابق تیکت ها</a></li>

                    </ul>
                </li>
            </ul>

        </div>
    </div>


</div>
