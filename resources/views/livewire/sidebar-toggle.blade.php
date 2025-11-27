<div x-data="{ sidebarCollapsed: false }">
    <!-- محتوای تست -->
    <div class="p-4 bg-red-100">
        تست AlpineJS:
        <span x-text="sidebarCollapsed ? 'جمع شده' : 'باز'"></span>
    </div>

    <!-- سایدبار ساده -->
    <div class="fixed inset-y-0 right-0 w-64 bg-blue-100 shadow-lg p-4"
         x-show="!sidebarCollapsed"
         style="background-color: #f8f9fa;"> <!-- تغییر رنگ پس‌زمینه -->
            <div class="sticky">
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="side-header border-b border-dark-500 pb-4 mb-4"> <!-- رنگ border را تیره‌تر کردیم -->
                <div class="side-header">
                    <a  href="{{ route('admin.panel') }}">
                        <img src="{{ asset('assets/image/logo-5.png')}}" class="" alt="logo">
                    </a>
                    <!-- LOGO -->
                </div>
                <div class="main-sidemenu">
                    <div class="slide-left disabled" id="slide-left"></div>
                    <ul class="side-menu">
                        <li class="sub-category">
                            <h3>اصلی</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.panel')}}"><i class="side-menu__icon fe fe-home"></i><span class ="side-menu__label">صفحه اصلی</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                    class="side-menu__icon fe fe-package"></i><span
                                    class="side-menu__label">سرویس ها</span><i
                                    class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu mega-slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                                <div class="mega-menu">
                                    <div class="">
                                        <ul>
                                            <li><a href="{{route('appointments.create')}}" class="slide-item">ثبت  سرویس جدید</a></li>
                                            <li><a href="{{route('appointments.index')}}" class="slide-item"> سرویس های ثبت شده</a></li>
                                            <li><a href="/html/colors.html" class="slide-item"> </a></li>
                                            <li><a href="/html/avatarsquare.html" class="slide-item"> آواتار مربعی</a></li>
                                            <li><a href="/html/avatar-radius.html" class="slide-item">  آواتار گرد</a></li>
                                            <li><a href="/html/avatar-round.html" class="slide-item"> آواتار دایره ای</a></li>
                                            <li><a href="/html/dropdown.html" class="slide-item"> دراپ داون</a></li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li><a href="/html/listgroup.html" class="slide-item"> گروه فهرست</a></li>
                                            <li><a href="/html/tags.html" class="slide-item"> برچسب‌ها</a></li>
                                            <li><a href="/html/pagination.html" class="slide-item"> صفحه بندی</a></li>
                                            <li><a href="/html/navigation.html" class="slide-item"> پیمایش</a></li>
                                            <li><a href="/html/typography.html" class="slide-item"> تایپوگرافی</a></li>
                                            <li><a href="/html/breadcrumbs.html" class="slide-item"> مسیر سایت</a></li>
                                            <li><a href="/html/badge.html" class="slide-item"> نشان‌ها / قرص‌ها</a></li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li><a href="/html/panels.html" class="slide-item"> پانل‌ها</a></li>
                                            <li><a href="/html/thumbnails.html" class="slide-item"> تصاویر کوچک</a></li>
                                            <li><a href="/html/offcanvas.html" class="slide-item">منوی جانبی</a></li>
                                            <li><a href="/html/toast.html" class="slide-item"> تست</a></li>
                                            <li><a href="/html/scrollspy.html" class="slide-item"> نشانگر پیمایش</a></li>
                                            <li><a href="/html/mediaobject.html" class="slide-item"> مدیا آبجکت</a></li>
                                        </ul>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li><a href="/html/accordion.html" class="slide-item"> آکاردئون </a></li>
                                            <li><a href="/html/tabs.html" class="slide-item"> برگه‌ها</a></li>
                                            <li><a href="/html/modal.html" class="slide-item"> مودال</a></li>
                                            <li><a href="/html/tooltipandpopover.html" class="slide-item"> تولتیپ و پاپ اور</a></li>
                                            <li><a href="/html/progress.html" class="slide-item"> پیشرفت</a></li>
                                            <li><a href="/html/carousel.html" class="slide-item"> اسلایدر</a></li>    <li><a href="ribbons.html" class="slide-item"> ریبون ها</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">برنامه ها</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)">برنامه‌ها</a></li>
                                <li><a href="html/cards.html" class="slide-item"> کارت</a></li>
                                <li><a href="/html/calendar.html" class="slide-item"> تقویم پیش‌فرض</a></li>
                                <li><a href="/html/calendar2.html" class="slide-item"> تقویم کامل</a></li>
                                <li><a href="/html/chat.html" class="slide-item"> گپ</a></li>
                                <li><a href="/html/notify.html" class="slide-item"> اعلان‌ها</a></li>
                                <li><a href="/html/sweetalert.html" class="slide-item"> سویت آلرت</a></li>
                                <li><a href="/html/rangeslider.html" class="slide-item"> نوار بازه محدوده</a></li>
                                <li><a href="/html/scroll.html" class="slide-item"> نوار پیمایش محتوا</a></li>
                                <li><a href="/html/loaders.html" class="slide-item"> لودرها</a></li>
                                <li><a href="/html/counters.html" class="slide-item"> شمارنده</a></li>
                                <li><a href="/html/rating.html" class="slide-item"> رتبه‌بندی</a></li>
                                <li><a href="/html/timeline.html" class="slide-item"> تایم لاین</a></li>
                                <li><a href="/html/treeview.html" class="slide-item"> نمای درختی</a></li>
                                <li><a href="/html/chart.html" class="slide-item"> نمودارها</a></li>
                                <li><a href="/html/footers.html" class="slide-item"> پاورقی</a></li>
                                <li><a href="/html/users-list.html" class="slide-item"> فهرست کاربران</a></li>
                                <li><a href="/html/search.html" class="slide-item">جستجو</a></li>
                                <li><a href="/html/crypto-currencies.html" class="slide-item"> ارزهای رمزنگلری شده</a></li>
                                <li><a href="/html/widgets.html" class="slide-item"> ابزارک‌ها</a></li>

                            </ul>
                        </li>

                        <li>
                            <a class="side-menu__item has-link" href="landing-page.html" target="_blank"><i
                                    class="side-menu__icon fe fe-zap"></i><span
                                    class="side-menu__label">لیندینگ پیج</span><span class="badge bg-green br-5 side-badge blink-text pb-1">جدید</span></a>
                        </li>
                        <li class="sub-category">
                            <h3>صفحات از قبل ساخته شده</h3>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">صفحات</span><i class="angle fe fe-chevron-right"></i></a>
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
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">فرم‌ها</span> <i class="sub-angle fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu">
                                        <li><a href="/html/form-elements.html" class="sub-slide-item"> عناصر فرم</a></li>
                                        <li><a href="/html/form-layouts.html" class="sub-slide-item"> طرح‌بندی فرم</a></li>
                                        <li><a href="/html/form-advanced.html" class="sub-slide-item"> فرم پیشرفته</a></li>
                                        <li><a href="/html/form-editor.html" class="sub-slide-item"> ویرایشگر فرم</a></li>
                                        <li><a href="/html/form-wizard.html" class="sub-slide-item"> فرم مرحله ای</a></li>
                                        <li><a href="/html/form-validation.html" class="sub-slide-item"> اعتبار سنجی فرم</a></li>
                                        <li><a href="/html/form-input-spinners.html" class="sub-slide-item"> اسپینرهای ورودی فرم</a></li>
                                    </ul>
                                </li>
                                <li class="sub-slide">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">جدول</span> <i class="sub-angle fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu">
                                        <li><a href="/html/tables.html" class="sub-slide-item">جدول پیش‌فرض</a></li>
                                        <li><a href="/html/datatable.html" class="sub-slide-item"> جداول داده</a></li>
                                        <li><a href="/html/edit-table.html" class="sub-slide-item"> ویرایش جداول</a></li>
                                        <li><a href="/html/extension-tables.html" class="sub-slide-item"> جداول برنامه افزودنی</a></li>
                                    </ul>
                                </li>
                                <li class="sub-slide">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">دیگر صفحات</span> <i class="sub-angle fe fe-chevron-right"></i></a>
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
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-shopping-bag"></i><span class="side-menu__label">تجارت الکترونیک</span><i class="angle fe fe-chevron-right"></i></a>
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
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-folder"></i><span class ="side-menu__label">مدیر فایل</span><span class="badge bg-pink side-badge">4</span><i class="angle fe fe-chevron-right hor-angle"></i></a>
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
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">احراز هویت</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)">احراز هویت</a></li>
                                <li><a href="/html/login.html" class="slide-item"> ورود به سیستم</a></li>
                                <li><a href="/html/register.html" class="slide-item"> ثبت نام</a></li>
                                <li><a href="/html/forgot-password.html" class="slide-item"> فراموشی رمز</a></li>
                                <li><a href="/html/lockscreen.html" class="slide-item"> صفحه قفل</a></li>
                                <li class="sub-slide">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">صفحات خطا</span ><i class="sub-angle fe fe-chevron-right"></i></a>
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
                                <span class="side-menu__label">موارد زیر منو</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)">موارد زیر منو</a></li>
                                <li><a href="javascript:void(0)" class="slide-item">زیرمنوی-1</a></li>
                                <li class="sub-slide">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span class="sub-side-menu__label">زیرمنوی 2</span><i class="sub-angle fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu">
                                        <li><a class="sub-slide-item" href="javascript:void(0)">زیر منو-2.1</a></li>
                                        <li><a class="sub-slide-item" href="javascript:void(0)">زیر منوی 2.2</a></li>
                                        <li class="sub-slide2">
                                            <a class="sub-side-menu__item2" href="javascript:void(0)" data-bs-toggle="sub-slide2"><span class="sub-side-menu__label2">زیرمنوی-2.3</span><i class="sub-angle2 fe fe-chevron-right"></i></a>
                                            <ul class="sub-slide-menu2">
                                                <li><a href="javascript:void(0)" class="sub-slide-item2">زیرمنوی-2.3.1</a></li>
                                                <li><a href="javascript:void(0)" class="sub-slide-item2">زیرمنوی-2.3.2</a></li>
                                                <li><a href="javascript:void(0)" class="sub-slide-item2">زیر منو-2.3.3</a></li>
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
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-map-pin"></i><span class="side-menu__label">نقشه ها</span><i class="angle fe fe-chevron-right"></i></a>
                            <ul class="slide-menu">
                                <li class="side-menu-label1"><a href="javascript:void(0)">نقشه‌ها</a></li>
                                <li><a href="/html/maps1.html" class="slide-item">نقشه‌های بروشور</a></li>
                                <li><a href="/html/maps2.html" class="slide-item">Mapel Maps</a></li>
                                <li><a href="/html/maps.html" class="slide-item">نقشه‌های برداری</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-bar-chart-2"></i><span class="side-menu__label">نمودار ها</span><span class="badge bg-secondary side-badge">6</span><i class="angle fe fe-chevron-right hor-angle"></i></a>
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
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-wind"></i><span class="side-menu__label">آیکن ها</span><i class="angle fe fe-chevron-right"></i></a>
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
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->

        </div>

    </div>

    <!-- دکمه toggle -->
    <button @click="sidebarCollapsed = !sidebarCollapsed"
            class="fixed bottom-4 right-4 bg-blue-500 text-dark p-2 rounded">
        <i x-text="sidebarCollapsed ? '→' : '←'"></i>
    </button>
</div>
