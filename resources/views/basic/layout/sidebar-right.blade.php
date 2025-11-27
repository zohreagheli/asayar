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
                            </svg></i><span class="side-menu__label" style="padding-left: 8px !important">داشبورد</span></a>
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
                            <div class="">
                                <ul>
                                    <li><a href="{{ route('tickets.create') }}" class="slide-item"> </a></li>
                                    <li><a href="" class="slide-item"> </a></li>
                                    <li><a href="/html/pagination.html" class="slide-item"> </a></li>
                                    <li><a href="/html/navigation.html" class="slide-item"> </a></li>
                                    <li><a href="/html/typography.html" class="slide-item"> </a></li>
                                    <li><a href="/html/breadcrumbs.html" class="slide-item"> </a></li>
                                    <li><a href="/html/badge.html" class="slide-item"> </a></li>
                                </ul>
                            </div>
                            <div class="">
                                <ul>
                                    <li><a href="/html/panels.html" class="slide-item"> </a></li>
                                    <li><a href="/html/thumbnails.html" class="slide-item"> </a></li>
                                    <li><a href="/html/offcanvas.html" class="slide-item"></a></li>
                                    <li><a href="/html/toast.html" class="slide-item"> </a></li>
                                    <li><a href="/html/scrollspy.html" class="slide-item"> </a></li>
                                    <li><a href="/html/mediaobject.html" class="slide-item"> </a></li>
                                </ul>
                            </div>
                            <div class="">
                                <ul>
                                    <li><a href="/html/accordion.html" class="slide-item"></a></li>
                                    <li><a href="/html/tabs.html" class="slide-item"> </a></li>
                                    <li><a href="/html/modal.html" class="slide-item"> </a></li>
                                    <li><a href="/html/tooltipandpopover.html" class="slide-item"></a></li>
                                    <li><a href="/html/progress.html" class="slide-item"> </a></li>
                                    <li><a href="/html/carousel.html" class="slide-item"></a></li>
                                    <li><a href="ribbons.html" class="slide-item"></a></li>
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

               <!-- <li>
                    <a class="side-menu__item has-link" href="landing-page.html" target="_blank"><i
                            class="side-menu__icon fe fe-zap"></i><span class="side-menu__label">لیندینگ
                            پیج</span><span class="badge bg-green br-5 side-badge blink-text pb-1">جدید</span></a>
                </li>
                <li class="sub-category">
                    <h3>صفحات از قبل ساخته شده</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">صفحات</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">صفحات</a></li>
                        <li><a href="/html/profile.html" class="slide-item"> پروفایل</a></li>
                        <li><a href="/html/editprofile.html" class="slide-item"> ویرایش پروفایل</a></li>
                        <li><a href="/html/notify-list.html" class="slide-item"> فهرست اعلان‌ها</a></li>
                        <li><a href="/html/email-compose.html" class="slide-item"> نوشتن ایمیل</a></li>
                        <li><a href="/html/email-inbox.html" class="slide-item"> صندوق ورودی ایمیل</a></li>
                        <li><a href="/html/email-read.html" class="slide-item"> محتوای ایمیل</a></li>
                        <li><a href="/html/gallery.html" class="slide-item"> گللری</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">فرم‌ها</span> <i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="/html/form-elements.html" class="sub-slide-item"> عناصر فرم</a></li>
                                <li><a href="/html/form-layouts.html" class="sub-slide-item"> طرح‌بندی فرم</a></li>
                                <li><a href="/html/form-advanced.html" class="sub-slide-item"> فرم پیشرفته</a></li>
                                <li><a href="/html/form-editor.html" class="sub-slide-item"> ویرایشگر فرم</a></li>
                                <li><a href="/html/form-wizard.html" class="sub-slide-item"> فرم مرحله ای</a></li>
                                <li><a href="/html/form-validation.html" class="sub-slide-item"> اعتبار سنجی فرم</a>
                                </li>
                                <li><a href="/html/form-input-spinners.html" class="sub-slide-item"> اسپینرهای ورودی
                                        فرم</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">جدول</span> <i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="/html/tables.html" class="sub-slide-item">جدول پیش‌فرض</a></li>
                                <li><a href="/html/datatable.html" class="sub-slide-item"> جداول داده</a></li>
                                <li><a href="/html/edit-table.html" class="sub-slide-item"> ویرایش جداول</a></li>
                                <li><a href="/html/extension-tables.html" class="sub-slide-item"> جداول برنامه
                                        افزودنی</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">دیگر صفحات</span> <i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="/html/about.html" class="sub-slide-item"> درباره شرکت</a></li>
                                <li><a href="/html/services.html" class="sub-slide-item"> خدمات</a></li>
                                <li><a href="/html/faq.html" class="sub-slide-item"> سوالات متداول</a></li>
                                <li><a href="/html/terms.html" class="sub-slide-item"> شرایط</a></li>
                                <li><a href="/html/invoice.html" class="sub-slide-item"> فاکتور</a></li>
                                <li><a href="/html/pricing.html" class="sub-slide-item"> جداول قیمت‌گذاری</a></li>
                                <li><a href="/html/settings.html" class="sub-slide-item"> تنظیمات</a></li>
                                <li><a href="/html/blog.html" class="sub-slide-item"> وبلاگ</a></li>
                                <li><a href="/html/blog-details.html" class="sub-slide-item"> جزئیات وبلاگ</a></li>
                                <li><a href="/html/blog-post.html" class="sub-slide-item"> پست وبلاگ</a></li>
                                <li><a href="/html/empty.html" class="sub-slide-item"> صفحه خالی</a></li>
                                <li><a href="/html/construction.html" class="sub-slide-item"> در حال ساخت</a></li>
                            </ul>
                        </li>
                        <li><a href="switcher-1.html" class="slide-item"> سوئیچر</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">تجارت
                            الکترونیک</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">تجارت الکترونیک</a></li>
                        <li><a href="/html/shop.html" class="slide-item"> فروشگله</a></li>
                        <li><a href="/html/shop-description.html" class="slide-item"> جزئیات محصول</a></li>
                        <li><a href="/html/cart.html" class="slide-item"> سبد خرید</a></li>
                        <li><a href="/html/add-product.html" class="slide-item"> افزودن محصول</a></li>
                        <li><a href="/html/wishlist.html" class="slide-item"> فهرست علاقه مندی</a></li>
                        <li><a href="/html/checkout.html" class="slide-item"> تسویه حساب</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-folder"></i><span class ="side-menu__label">مدیر
                            فایل</span><span class="badge bg-pink side-badge">4</span><i
                            class="angle fe fe-chevron-right hor-angle"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">مدیر فایل</a></li>
                        <li><a href="/html/file-manager.html" class="slide-item"> مدیر فایل</a></li>
                        <li><a href="/html/filemanager-list.html" class="slide-item"> فهرست مدیر فایل</a></li>
                        <li><a href="/html/filemanager-details.html" class="slide-item"> جزئیات فایل</a></li>
                        <li><a href="/html/file-attachments.html" class="slide-item"> فایل های پیوست </a></li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>صفحات متفرقه</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-users"></i><span class="side-menu__label">احراز هویت</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">احراز هویت</a></li>
                        <li><a href="/html/login.html" class="slide-item"> ورود به سیستم</a></li>
                        <li><a href="/html/register.html" class="slide-item"> ثبت نام</a></li>
                        <li><a href="/html/forgot-password.html" class="slide-item"> فراموشی رمز</a></li>
                        <li><a href="/html/lockscreen.html" class="slide-item"> صفحه قفل</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">صفحات خطا</span><i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="/html/400.html" class="sub-slide-item"> 400</a></li>
                                <li><a href="/html/401.html" class="sub-slide-item"> 401</a></li>
                                <li><a href="/html/403.html" class="sub-slide-item"> 403</a></li>
                                <li><a href="/html/404.html" class="sub-slide-item"> 404</a></li>
                                <li><a href="/html/500.html" class="sub-slide-item"> 500</a></li>
                                <li><a href="/html/503.html" class="sub-slide-item"> 503</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-cpu"></i>
                        <span class="side-menu__label">موارد زیر منو</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">موارد زیر منو</a></li>
                        <li><a href="javascript:void(0)" class="slide-item">زیرمنوی-1</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">زیرمنوی 2</span><i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="javascript:void(0)">زیر منو-2.1</a></li>
                                <li><a class="sub-slide-item" href="javascript:void(0)">زیر منوی 2.2</a></li>
                                <li class="sub-slide2">
                                    <a class="sub-side-menu__item2" href="javascript:void(0)"
                                        data-bs-toggle="sub-slide2"><span
                                            class="sub-side-menu__label2">زیرمنوی-2.3</span><i
                                            class="sub-angle2 fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu2">
                                        <li><a href="javascript:void(0)" class="sub-slide-item2">زیرمنوی-2.3.1</a>
                                        </li>
                                        <li><a href="javascript:void(0)" class="sub-slide-item2">زیرمنوی-2.3.2</a>
                                        </li>
                                        <li><a href="javascript:void(0)" class="sub-slide-item2">زیر منو-2.3.3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="sub-slide-item" href="javascript:void(0)">زیرمنوی-2.4</a></li>
                                <li><a class="sub-slide-item" href="javascript:void(0)">زیر منو-2.5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>عمومی</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-map-pin"></i><span class="side-menu__label">نقشه ها</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">نقشه‌ها</a></li>
                        <li><a href="/html/maps1.html" class="slide-item">نقشه‌های بروشور</a></li>
                        <li><a href="/html/maps2.html" class="slide-item">Mapel Maps</a></li>
                        <li><a href="/html/maps.html" class="slide-item">نقشه‌های برداری</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-bar-chart-2"></i><span class="side-menu__label">نمودار
                            ها</span><span class="badge bg-secondary side-badge">6</span><i
                            class="angle fe fe-chevron-right hor-angle"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">نمودارها</a></li>
                        <li><a href="/html/chart-chartist.html" class="slide-item">Js نمودار</a></li>
                        <li><a href="/html/chart-flot.html" class="slide-item">نمودار Flot</a></li>
                        <li><a href="/html/chart-echart.html" class="slide-item"> نمودار ECharts</a></li>
                        <li><a href="/html/chart-morris.html" class="slide-item"> نمودارهای Morris</a></li>
                        <li><a href="/html/chart-nvd3.html" class="slide-item"> نمودارهای Nvd3</a></li>
                        <li><a href="/html/charts.html" class="slide-item"> نمودارهای نواری C3</a></li>
                        <li><a href="/html/chart-line.html" class="slide-item"> نمودارهای خطی C3</a></li>
                        <li><a href="/html/chart-donut.html" class="slide-item"> نمودارهای دونات C3</a></li>
                        <li><a href="/html/chart-pie.html" class="slide-item"> نمودارهای C3 Pie</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-wind"></i><span class="side-menu__label">آیکن ها</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">آیکن ها</a></li>
                        <li><a href="/html/icons.html" class="slide-item"> Font Awesome</a></li>
                        <li><a href="/html/icons2.html" class="slide-item"> آیکن متریال</a></li>
                        <li><a href="/html/icons3.html" class="slide-item"> آیکن خط ساده</a></li>
                        <li><a href="/html/icons4.html" class="slide-item"> آیکن Feather</a></li>
                        <li><a href="/html/icons5.html" class="slide-item"> نمادهای Ionic</a></li>
                        <li><a href="/html/icons6.html" class="slide-item"> آیکن پرچم</a></li>
                        <li><a href="/html/icons7.html" class="slide-item"> آیکن pe7</a></li>
                        <li><a href="/html/icons8.html" class="slide-item"> آیکن Themify</a></li>
                        <li><a href="/html/icons9.html" class="slide-item">آیکن Typicons</a></li>
                        <li><a href="/html/icons10.html" class="slide-item">آیکن آب و هوا</a></li>
                        <li><a href="/html/icons11.html" class="slide-item">آیکن بوت استرپ</a></li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
                -->
        </div>
    </div>
   <!--/APP-SIDEBAR-->

</div>
