<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Kavenegar\KavenegarApi; // پکیج اصلی Kavenegar

class OtpService
{
    protected static int $length = 4; // طول کد
    protected static int $ttl = 120;  // مدت اعتبار کد (ثانیه)

    /**
     * نرمال کردن شماره موبایل به فرمت بین‌المللی
     */
    protected static function normalizeMobile(string $mobile): string
    {
        $m = trim($mobile);
        if (str_starts_with($m, '0')) {
            $m = '+98' . substr($m, 1);
        } elseif (str_starts_with($m, '9')) {
            $m = '+98' . $m;
        }
        return $m;
    }

    /**
     * تولید کد تصادفی
     */
    protected static function generateCode(): string
    {
        $min = (int) pow(10, static::$length - 1);
        $max = (int) pow(10, static::$length) - 1;
        return (string) rand($min, $max);
    }

    /**
     * کلید کش برای هر شماره موبایل
     */
    protected static function cacheKey(string $mobile): string
    {
        return "otp:{$mobile}";
    }

    /**
     * ارسال OTP و ذخیره در کش
     */
    public static function sendOtp(string $mobile, array $options = []): array
    {
        $mobileNormalized = static::normalizeMobile($mobile);

        if (!empty($options['length'])) {
            static::$length = (int) $options['length'];
        }
        if (!empty($options['ttl'])) {
            static::$ttl = (int) $options['ttl'];
        }

        $rateKey = "otp:rate:{$mobileNormalized}";
        if (Cache::has($rateKey)) {
            return [
                'ok' => false,
                'message' => 'درخواست خیلی سریع است. لطفاً چند ثانیه صبر کنید.'
            ];
        }

        $code = static::generateCode();
        $cacheKey = static::cacheKey($mobileNormalized);

        Cache::put($cacheKey, $code, static::$ttl);
        Cache::put($rateKey, true, 60);

        try {
            $apiKey = env('KAVENEGAR_API_KEY');
            $kavenegar = new KavenegarApi($apiKey);

            if (!empty($options['use_template']) && !empty($options['template'])) {
                // ارسال با قالب
                $kavenegar->VerifyLookup(
                    $mobileNormalized,
                    $code,
                    null,
                    null,
                    $options['template']
                );
            } else {
                // ارسال متن ساده
                $message = "کد تایید شما: {$code}";
                $kavenegar->Send("2000660110", $mobileNormalized, $message);
            }

            Log::info("OTP sent to {$mobileNormalized}", ['code' => $code]);

            return [
                'ok' => true,
                'message' => 'کد با موفقیت ارسال شد.'
            ];
        } catch (\Throwable $e) {
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

        if ($cached && hash_equals((string)$cached, (string)$code)) {
            Cache::forget($cacheKey);
            return true;
        }

        return false;
    }
}
