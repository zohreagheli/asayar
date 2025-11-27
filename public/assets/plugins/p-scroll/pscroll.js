(function($) {
    "use strict";

    // تابع مقداردهی PerfectScrollbar
    function initPerfectScrollbar(selector) {
        const element = document.querySelector(selector);
        if (element && !element._psInstance) { // بررسی اینکه قبلاً مقداردهی نشده
            element._psInstance = new PerfectScrollbar(element, {
                useBothWheelAxes: true,
                suppressScrollX: true,
                suppressScrollY: false,
            });
        }
    }

    // وقتی DOM کامل لود شد
    document.addEventListener('DOMContentLoaded', function () {
        // اطمینان از نمایش سایدبار
        const sidebar = document.querySelector('.app-sidebar');
        if (sidebar) {
            sidebar.style.display = 'block';
        }

        // مقداردهی PerfectScrollbar
        initPerfectScrollbar('.app-sidebar');
        initPerfectScrollbar('.header-dropdown-list');
        initPerfectScrollbar('.notifications-menu');
        initPerfectScrollbar('.message-menu-scroll');
    });

    // برای رندرهای بعدی Livewire
    Livewire.hook('message.processed', (message, component) => {
        initPerfectScrollbar('.app-sidebar');
        initPerfectScrollbar('.header-dropdown-list');
        initPerfectScrollbar('.notifications-menu');
        initPerfectScrollbar('.message-menu-scroll');
    });

})(jQuery);
