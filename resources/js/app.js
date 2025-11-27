// resources/js/app.js

import './bootstrap';

// --- jQuery + PersianDatepicker ---
import $ from 'jquery';
window.$ = $;
window.jQuery = $;

import 'persian-datepicker/dist/css/persian-datepicker.min.css';
import 'persian-datepicker/dist/js/persian-datepicker';

// --- Alpine.js ---
import Alpine from 'alpinejs';
window.Alpine = Alpine;

// --- PerfectScrollbar ---
import PerfectScrollbar from 'perfect-scrollbar';
import 'perfect-scrollbar/css/perfect-scrollbar.css';

// ---------------------------------------------------
// اجرای Livewire و Alpine
// ---------------------------------------------------
document.addEventListener('livewire:init', () => {

    // --- PersianDatepicker ---
    const persianDateInput = $('#persian-datepicker');
    if (persianDateInput.length) {
        persianDateInput.persianDatepicker({
            format: 'YYYY/MM/DD',
            autoClose: true,
            initialValue: false,
            position: 'auto',
            observer: true,
        });
    } else {
        console.warn('PersianDatepicker element not found!');
    }

    // --- PerfectScrollbar ---
    const scrollElement = document.querySelector('.scrollable-element');
    if (scrollElement) {
        new PerfectScrollbar(scrollElement, {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20,
            rtl: true
        });
    } else {
        console.warn('Scrollable element not found!');
    }
});

// ---------------------------------------------------
// Alpine.js store برای sidebar
// ---------------------------------------------------
document.addEventListener('alpine:init', () => {
    Alpine.store('sidebar', {
        collapsed: localStorage.getItem('sidebarCollapsed') === 'true',

        toggle() {
            this.collapsed = !this.collapsed;
            localStorage.setItem('sidebarCollapsed', this.collapsed);
        }
    });

    Alpine.start();
});
