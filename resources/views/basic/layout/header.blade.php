
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->

            <!-- LOGO -->
            <livewire:search-box />
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <div class="dropdown d-none">
                    <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                        <i class="fe fe-search"></i>
                    </a>
                    <div class="dropdown-menu header-search dropdown-menu-start">
                        <div class="input-group w-100 p-2">
                            <input type="text" class="form-control" placeholder="جستجو ...">
                            <div class="input-group-text btn btn-primary">
                                <i class="fe fe-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <div class="dropdown d-lg-none d-flex">
                                <a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="جستجو ...">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- COUNTRY
                            <div class="d-flex country">
                                <a class="nav-link icon text-center" data-bs-target="#country-selector"
                                    data-bs-toggle="modal">
                                    <i class="fe fe-globe"></i><span class="fs-16 ms-2 d-none d-xl-block">انگلیسی</span>
                                </a>
                            </div>
                            COUNTRY -->
                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                </a>
                            </div>
                            <!-- Theme-Layout -->

                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>
                            <!-- FULL-SCREEN -->

                            <!-- SIDE-MENU -->
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex align-items-center">
                                    <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; border: 2px solid #5b5959; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset('storage/avatars/'.auth()->user()->avatar) }}?v={{ time() }}"
                                                 alt="profile-user"
                                                >
                                        @else
                                            <img src="{{ asset('assets/images/panel/users/21.jpg') }}"
                                                 alt="profile-user"
                                                 >
                                        @endif
                                    </div>
                                </a>
                                <!-- ... بقیه منو ... -->
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('profile') }}" wire:navigate>
                                        <i class="dropdown-icon fe fe-user"></i> پروفایل
                                    </a>
                                    <!-- <a class="dropdown-item" href="email-inbox.html">
                                        <i class="dropdown-icon fe fe-mail"></i> صندوق ورودی
                                        <span class="badge bg-danger rounded-pill float-end">5</span>
                                    </a>
                                    <a class="dropdown-item" href="lockscreen.html">
                                        <i class="dropdown-icon fe fe-lock"></i> صفحه قفل
                                    </a>-->
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault();         document.getElementById('logout-form').submit();">
                                        <i class="dropdown-icon fe fe-log-out"></i> خروج از سیستم
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               {{-- <div class="demo-icon nav-link icon">
                    <i class="fe fe-settings fa-spin  text_primary"></i>--}}
                </div>
            </div>
        </div>
    </div>
</div>
