<div class=" header sticky ">
    <div class="container-fluid main-container">
        <div class="d-flex align-items-center w-100">
            <!-- LOGO-->
            <div class="logo-wrapper  d-flex align-items-center">
                <a href="{{ route('admin.panel') }}">
                    <img src="{{ asset('assets/image/logo-206.png') }}" class="header-brand-img desktop-logo"
                        alt="logo" style="height:55px;">
                </a>
            </div>
            <!-- /LOGO -->
            <!-- منو -->
            <div class="d-flex align-items-center ms-4 gap-4 nav-menu">
                <a href="{{ route('about') }}" class="nav-item-circle">
                    <i class="fas fa-building"></i>
                    <span>معرفی شرکت</span>
                </a>
                <a href="{{ route('all-technicians') }}" class="nav-item-circle">
                    <i class="fas fa-users"></i>
                    <span>سرویسکاران</span>
                </a>
                <a href="{{ route('gallery') }}" class="nav-item-circle">
                    <i class="fas fa-images"></i>
                    <span>گالری</span>
                </a>
                <a href="{{ route('contact') }}" class="nav-item-circle">
                    <i class="fas fa-phone-alt"></i>
                    <span>تماس با ما</span>
                </a>
            </div>

            <div class="ms-auto d-flex order-lg-2  header-right-icons">
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
                                    <i class="fe fe-globe"></i><span
                                        class="fs-16 ms-2 d-none d-xl-block">انگلیسی</span>
                                </a>
                            </div>
                           COUNTRY -->
                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                      <div class="nav-item-circle">
                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                  </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg">
                          <div class="nav-item-circle">
                        <i class="fe fe-minimize fullscreen-button"></i>
                         </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
