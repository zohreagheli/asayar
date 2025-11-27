<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header"style="display: flex; align-items: center; padding: 10px 15px;">
            <a href="{{ route('home.page') }}">
                <img src="{{ asset('assets/image/logo-206.png') }}" class="" alt="logo">
            </a>
            <!-- LOGO -->

            <div class="user-name"
                style="margin-right: 10px; color: #35353b; font-weight: bold; font-size: 16px; text-transform: capitalize;">
                @auth
                    <span>{{ auth()->user()->name }}</span>
                @endauth
            </div>
        </div>
        <div class="main-sidemenu" >
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>

            <ul class="side-menu">
                <li class="sub-category">
                    <h3></h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('home.page') }}"><i
                            class=""></i><span class ="side-menu__label">صفحه اصلی</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('admin.dashboard') }}"
                        style="display: flex; align-items: center; gap: 8px;"> <i class="">
                            </i><span class="side-menu__label" style="">داشبورد</span></a>
                </li>
                <li class="slide">
                   <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('appointments.index') }}"
                        style=""><i class="">
                           </i><span class="side-menu__label">مدیریت سرویس ها</span><i
                            class=""></i></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.technicians') }}"><i
                            class=""></i><span class="side-menu__label">مدیریت سرویسکاران</span><i
                            class=""></i></a>

                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('tickets.list') }}"><i
                            class=""></i><span class="side-menu__label">پشتیبانی</span><i
                            class=""></i></a>

                </li>
            <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.gallery') }}"><i
                            class=""></i><span class="side-menu__label">مدیریت گالری</span><i
                            class=""></i></a>

                </li>
                 <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.chat') }}"><i
                            class=""></i><span class="side-menu__label">ارتباط با کاربران</span><i
                            class=""></i></a>

                </li>
        </div>
    </div>
   <!--/APP-SIDEBAR-->

</div>
