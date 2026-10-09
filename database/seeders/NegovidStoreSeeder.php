<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NegovidStoreSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'چارم موبایل',
                'slug' => 'mobile-charm',
                'description' => 'چارم‌های ظریف و شیک برای موبایل شما',
                'sort_order' => 1,
            ],
            [
                'name' => 'آویز کیف',
                'slug' => 'bag-charm',
                'description' => 'آویزهای خاص برای زیباسازی کیف شما',
                'sort_order' => 2,
            ],
            [
                'name' => 'گردنبند',
                'slug' => 'necklace',
                'description' => 'گردنبندهای ظریف و لوکس برای استایل شما',
                'sort_order' => 3,
            ],
            [
                'name' => 'گوشواره',
                'slug' => 'earring',
                'description' => 'گوشواره‌های زیبا و خاص برای هر مناسبتی',
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        $products = [
            // چارم موبایل
            ['category_slug' => 'mobile-charm', 'name' => 'چارم موبایل مدل الماس طلایی', 'price' => 189000, 'discount_price' => 149000, 'stock' => 15, 'is_bestseller' => true, 'is_featured' => true],
            ['category_slug' => 'mobile-charm', 'name' => 'چارم موبایل مدل مروارید ظریف', 'price' => 159000, 'discount_price' => null, 'stock' => 20, 'is_new' => true, 'is_featured' => true],
            ['category_slug' => 'mobile-charm', 'name' => 'چارم موبایل مدل قلب طلایی', 'price' => 129000, 'discount_price' => 99000, 'stock' => 8, 'is_bestseller' => true],
            ['category_slug' => 'mobile-charm', 'name' => 'چارم موبایل مدل ستاره درخشان', 'price' => 139000, 'discount_price' => null, 'stock' => 12, 'is_new' => true],

            // آویز کیف
            ['category_slug' => 'bag-charm', 'name' => 'آویز کیف مدل پوم‌پوم شامپاینی', 'price' => 99000, 'discount_price' => 79000, 'stock' => 25, 'is_bestseller' => true, 'is_featured' => true],
            ['category_slug' => 'bag-charm', 'name' => 'آویز کیف مدل زنجیر طلایی', 'price' => 119000, 'discount_price' => null, 'stock' => 10, 'is_new' => true],
            ['category_slug' => 'bag-charm', 'name' => 'آویز کیف مدل گل مینیاتوری', 'price' => 89000, 'discount_price' => 69000, 'stock' => 18],
            ['category_slug' => 'bag-charm', 'name' => 'آویز کیف مدل مروارید و روبان', 'price' => 109000, 'discount_price' => null, 'stock' => 5, 'is_new' => true],

            // گردنبند
            ['category_slug' => 'necklace', 'name' => 'گردنبند ظریف مدل قلب معلق', 'price' => 249000, 'discount_price' => 199000, 'stock' => 7, 'is_bestseller' => true, 'is_featured' => true],
            ['category_slug' => 'necklace', 'name' => 'گردنبند مدل الماس تک‌سنگ', 'price' => 329000, 'discount_price' => null, 'stock' => 4, 'is_new' => true, 'is_featured' => true],
            ['category_slug' => 'necklace', 'name' => 'گردنبند مدل هلال ماه طلایی', 'price' => 219000, 'discount_price' => 179000, 'stock' => 9, 'is_bestseller' => true],
            ['category_slug' => 'necklace', 'name' => 'گردنبند مدل زنجیر نازک', 'price' => 189000, 'discount_price' => null, 'stock' => 15, 'is_new' => true],

            // گوشواره
            ['category_slug' => 'earring', 'name' => 'گوشواره مدل الماس کوچک', 'price' => 159000, 'discount_price' => 129000, 'stock' => 11, 'is_bestseller' => true, 'is_featured' => true],
            ['category_slug' => 'earring', 'name' => 'گوشواره مدل مروارید کلاسیک', 'price' => 139000, 'discount_price' => null, 'stock' => 14, 'is_new' => true, 'is_featured' => true],
            ['category_slug' => 'earring', 'name' => 'گوشواره مدل حلقه طلایی', 'price' => 119000, 'discount_price' => 99000, 'stock' => 6, 'is_bestseller' => true],
            ['category_slug' => 'earring', 'name' => 'گوشواره مدل ستاره درخشان', 'price' => 129000, 'discount_price' => null, 'stock' => 0, 'is_new' => true],
        ];

        $descriptions = [
            'این محصول از مجموعه نمونه‌های نگووید است. تصویر نمایش‌داده‌شده موقتی است و توسط مدیر فروشگاه قابل جایگزینی با عکس واقعی محصول می‌باشد. مشخصات کامل پس از تأیید توسط مدیریت تکمیل خواهد شد.',
        ];

        foreach ($products as $product) {
            $category = Category::where('slug', $product['category_slug'])->first();
            Product::create([
                'category_id' => $category->id,
                'name' => $product['name'],
                'slug' => Str::slug($product['name']) . '-' . Str::random(6),
                'description' => $descriptions[0],
                'specifications' => null,
                'price' => $product['price'],
                'discount_price' => $product['discount_price'] ?? null,
                'stock' => $product['stock'],
                'is_active' => true,
                'is_featured' => $product['is_featured'] ?? false,
                'is_new' => $product['is_new'] ?? false,
                'is_bestseller' => $product['is_bestseller'] ?? false,
                'main_image' => null,
                'sort_order' => 0,
            ]);
        }

        // Test testimonials (marked as test content)
        Testimonial::create([
            'name' => 'کاربر نمونه',
            'rating' => 5,
            'message' => 'این یک نظر آزمایشی است و پس از دریافت نظرات واقعی مشتریان جایگزین خواهد شد.',
            'is_approved' => true,
            'is_test_content' => true,
        ]);
    }
}
