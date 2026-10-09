@extends('store.admin.layout')

@section('title', isset($product) ? 'ویرایش محصول' : 'افزودن محصول' . ' | پنل مدیریت نگووید')

@section('content')
<h1 class="text-2xl font-medium text-espresso mb-6">{{ isset($product) ? 'ویرایش محصول' : 'افزودن محصول جدید' }}</h1>

<form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
    @csrf
    @if(isset($product)) @method('PUT') @endif

    <div class="card p-6 space-y-4">
        <div>
            <label class="block text-sm text-bronze mb-1">نام محصول <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required>
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm text-bronze mb-1">دسته‌بندی <span class="text-red-500">*</span></label>
            <select name="category_id" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @if(old('category_id', $product->category_id ?? '') == $cat->id) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm text-bronze mb-1">توضیحات</label>
            <textarea name="description" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm text-bronze mb-1">مشخصات محصول</label>
            <textarea name="specifications" rows="3" placeholder="جنس، ابعاد، رنگ، نحوه نگهداری و...">{{ old('specifications', $product->specifications ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-bronze mb-1">قیمت (تومان) <span class="text-red-500">*</span></label>
                <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" required min="0">
            </div>
            <div>
                <label class="block text-sm text-bronze mb-1">قیمت تخفیف‌خورده</label>
                <input type="number" name="discount_price" value="{{ old('discount_price', $product->discount_price ?? '') }}" min="0">
            </div>
        </div>

        <div>
            <label class="block text-sm text-bronze mb-1">موجودی <span class="text-red-500">*</span></label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" required min="0">
        </div>

        <div>
            <label class="block text-sm text-bronze mb-1">تصویر اصلی محصول</label>
            @if(isset($product) && $product->main_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $product->main_image) }}" alt="" class="w-24 h-24 rounded-lg object-cover border border-dust">
                </div>
            @endif
            <input type="file" name="main_image" accept="image/*" class="border-0 p-0">
            <p class="text-xs text-bronze mt-1">حداکثر حجم: ۲ مگابایت</p>
        </div>

        <div class="flex flex-wrap gap-4 pt-2 border-t border-dust">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" @if(old('is_active', $product->is_active ?? true)) checked @endif class="text-gold focus:ring-gold">
                <span class="text-sm text-espresso">فعال</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" @if(old('is_featured', $product->is_featured ?? false)) checked @endif class="text-gold focus:ring-gold">
                <span class="text-sm text-espresso">ویژه</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_new" value="1" @if(old('is_new', $product->is_new ?? false)) checked @endif class="text-gold focus:ring-gold">
                <span class="text-sm text-espresso">جدید</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_bestseller" value="1" @if(old('is_bestseller', $product->is_bestseller ?? false)) checked @endif class="text-gold focus:ring-gold">
                <span class="text-sm text-espresso">پرفروش</span>
            </label>
        </div>
    </div>

    <div class="flex gap-3 mt-6">
        <button type="submit" class="btn-admin">{{ isset($product) ? 'به‌روزرسانی' : 'ایجاد محصول' }}</button>
        <a href="{{ route('admin.products') }}" class="text-sm text-bronze hover:text-gold pt-2">انصراف</a>
    </div>
</form>
@endsection
