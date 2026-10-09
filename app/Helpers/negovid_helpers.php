<?php

if (!function_exists('persian_number')) {
    function persian_number($number): string
    {
        $persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        return str_replace(range(0, 9), $persianDigits, number_format($number));
    }
}

if (!function_exists('persian_price')) {
    function persian_price($price): string
    {
        return persian_number($price) . ' تومان';
    }
}
