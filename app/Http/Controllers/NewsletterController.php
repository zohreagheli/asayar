<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NewsletterSubscriber;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $existing = NewsletterSubscriber::where('email', $request->email)->first();
        if ($existing) {
            return back()->with('info', 'ایمیل شما قبلاً ثبت شده است.');
        }

        NewsletterSubscriber::create(['email' => $request->email]);
        return back()->with('success', 'عضویت شما در خبرنامه با موفقیت ثبت شد.');
    }
}
