<?php

use Hekmatinasser\Verta\Verta;

if (!function_exists('jalali_date')) {

    function jalali_date($date, string $format = 'Y/m/d')
    {
        if (!$date) {
            return '-';
        }

        return verta($date)->format($format);
    }
}

if (!function_exists('jalali_datetime')) {

    function jalali_datetime($date, string $format = null)
    {
        if (!$date) {
            return '-';
        }

        $v = verta($date);

        // حالت پیش‌فرض ساده
        if ($format) {
            return $v->format($format);
        }

        // حالت سفارشی (همون چیزی که می‌خوای)
        return $v->format('Y/m/d')
            . ' <span class="text-muted mx-1">|</span> '
            . $v->format('H:i:s');
    }
}

if (!function_exists('jdiff')) {

    /**
     * چند دقیقه/ساعت/روز پیش
     */
    function jdiff($date)
    {
        if (!$date) {
            return '-';
        }

        return verta($date)->formatDifference();
    }
}

if (!function_exists('to_gregorian')) {

    /**
     * تبدیل تاریخ شمسی به میلادی
     * 1405/03/13 => 2026-06-03
     */
    function to_gregorian(string $jalaliDate)
    {
        return Verta::parse($jalaliDate)
            ->datetime()
            ->format('Y-m-d');
    }
}

if (!function_exists('today_jalali')) {

    /**
     * تاریخ امروز شمسی
     */
    function today_jalali()
    {
        return verta()->format('Y/m/d');
    }
}

if (!function_exists('now_jalali')) {

    /**
     * تاریخ و ساعت فعلی شمسی
     */
    function now_jalali()
    {
        return verta()->format('Y/m/d H:i');
    }
}

if (!function_exists('persian_numbers')) {

    /**
     * تبدیل اعداد انگلیسی به فارسی
     */
    function persian_numbers($string)
    {
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];

        return str_replace($english, $persian, $string);
    }
}

if (!function_exists('english_numbers')) {

    /**
     * تبدیل اعداد فارسی به انگلیسی
     */
    function english_numbers($string)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];

        return str_replace($persian, $english, $string);
    }
}
