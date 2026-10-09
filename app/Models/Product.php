<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'specifications',
        'price', 'discount_price', 'stock', 'is_active',
        'is_featured', 'is_new', 'is_bestseller', 'main_image', 'sort_order',
    ];

    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            if (empty($product->slug)) {
                $product->slug = 'product-' . Str::random(10);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFinalPriceAttribute(): int
    {
        return $this->discount_price ?? $this->price;
    }

    public function getDiscountPercentAttribute(): ?int
    {
        if ($this->discount_price && $this->price > 0) {
            return (int) round((1 - $this->discount_price / $this->price) * 100);
        }
        return null;
    }

    public function getInStockAttribute(): bool
    {
        return $this->stock > 0;
    }
}
