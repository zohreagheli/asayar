<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Kavenegar;

class OtpService
{
    // طول کد (4 یا 6)
    protected static int $length = 4;

    // مدت اعتبار کد بر حسب ثانیه
    protected static int $ttl = 120; // 2 دقیقه

    // پیش‌شماره (اختیاری) اگر شماره با 09 وارد شده باشد و نیاز به تبدیل باشد، اینجا هندل کن
    protected static function normalizeMobile(string $mobile): string
    {
        // مثال ساده: اگر با 0 شروع شود، آن را به +98 تبدیل کن
        $m = trim($mobile);
        if (str_starts_with($m, '0')) {
            $m = '+98' . substr($m, 1);
        } elseif (str_starts_with($m, '9')) {
            $m = '+98' . $m;
        }
        return $m;
    }

    // تولید کد
    protected static function generateCode(): string
    {
        $min = (int) pow(10, static::$length - 1);
        $max = (int) pow(10, static::$length) - 1;
        return (string) rand($min, $max);
    }

    // کلید کش برای یک شماره
    protected static function cacheKey(string $mobile): string
    {
        return "otp:{$mobile}";
    }

    /**
     * ارسال OTP و ذخیره در cache.
     *
     * @param string $mobile شماره موبایل (فرمت معمول ایرانی مثل 0912...)
     * @param array $options [
     *    'length' => 4|6,
     *    'ttl' => seconds,
     *    'use_template' => true|false,
     *    'template' => 'template-name' // اگر use_template true
     * ]
     *
     * @return array ['ok' => bool, 'message' => string]
     */
    public static function sendOtp(string $mobile, array $options = []): array
    {
        $mobileNormalized = static::normalizeMobile($mobile);

        // apply options
        if (!empty($options['length'])) {
            static::$length = (int) $options['length'];
        }
        if (!empty($options['ttl'])) {
            static::$ttl = (int) $options['ttl'];
        }

        // Rate limit: جلوگیری از ارسال بیش از حد (مثال ساده، 1 درخواست در 60 ثانیه)
        $rateKey = "otp:rate:{$mobileNormalized}";
        if (Cache::has($rateKey)) {
            return [
                'ok' => false,
                'message' => 'درخواست خیلی سریع است. لطفاً چند ثانیه صبر کنید.'
            ];
        }

        $code = static::generateCode();
        $cacheKey = static::cacheKey($mobileNormalized);

        // ذخیره کد در cache (می‌توان هش کرد، اما چون برای مقایسه مستقیم لازم داریم ذخیره می‌کنیم)
        Cache::put($cacheKey, $code, static::$ttl);

        // قرار دادن rate lock کوچک
        Cache::put($rateKey, true, 60); // قفل 60 ثانیه‌ای برای جلوگیری از چند ارسال سریع

        // پیامک: می‌توانید از VerifyLookup یا Send استفاده کنید.
        try {
            // اگر می‌خواهی از قالب (template) استفاده کنی:
            if (!empty($options['use_template']) && !empty($options['template'])) {
                // VerifyLookup مناسب ارسال OTP با template است
                Kavenegar::VerifyLookup(
                    $mobileNormalized,
                    $code,
                    null,
                    null,
                    $options['template']
                );
            } else {
                // ارسال متن ساده
                $message = "کد تایید شما: {$code}";
                // sender خالی بگذار، یا شماره پنل را قرار بده
                Kavenegar::Send("", $mobileNormalized, $message);
            }

            // موفقیت
            Log::info("OTP sent to {$mobileNormalized}", ['code' => $code]);

            return [
                'ok' => true,
                'message' => 'کد با موفقیت ارسال شد.'
            ];
        } catch (\Throwable $e) {
            // در صورت خطا: کش را پاک کن تا کاربر بتواند دوباره تلاش کند
            Cache::forget($cacheKey);
            Cache::forget($rateKey);

            Log::error("Failed to send OTP to {$mobileNormalized}: " . $e->getMessage(), [
                'exception' => $e
            ]);

            return [
                'ok' => false,
                'message' => 'ارسال پیامک با خطا مواجه شد. لطفاً بعداً تلاش کنید.'
            ];
        }
    }

    /**
     * بررسی کد وارد شده
     */
    public static function verifyOtp(string $mobile, string $code): bool
    {
        $mobileNormalized = static::normalizeMobile($mobile);
        $cacheKey = static::cacheKey($mobileNormalized);

        $cached = Cache::get($cacheKey);

        // حذف کد در اولین تلاش موفق برای جلوگیری از reuse
        if ($cached && hash_equals((string)$cached, (string)$code)) {
            Cache::forget($cacheKey);
            return true;
        }

        return false;
    }
}
