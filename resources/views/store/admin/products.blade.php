@extends('store.admin.layout')

@section('title', 'محصولات | پنل مدیریت نگووید')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-medium text-espresso">مدیریت محصولات</h1>
    <a href="{{ route('admin.products.create') }}" class="btn-admin">افزودن محصول</a>
</div>

<form action="{{ route('admin.products') }}" method="GET" class="mb-4">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="جست‌وجوی محصول..." class="max-w-xs">
</form>

<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-bronze text-xs border-b border-dust">
                    <th class="text-right py-3 px-4">تصویر</th>
                    <th class="text-right py-3 px-4">نام محصول</th>
                    <th class="text-right py-3 px-4">دسته</th>
                    <th class="text-right py-3 px-4">قیمت</th>
                    <th class="text-right py-3 px-4">موجودی</th>
                    <th class="text-right py-3 px-4">وضعیت</th>
                    <th class="text-right py-3 px-4">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b border-dust/40 hover:bg-sand/30">
                        <td class="py-3 px-4">
                            <div class="w-12 h-12 rounded-lg overflow-hidden bg-sand">
                                @if($product->main_image)
                                    <img src="{{ asset('storage/' . $product->main_image) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-dust" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.58-4.58A2 2 0 0110 11h4a2 2 0 011.42.58L20 16M6 6h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="py-3 px-4 text-espresso">{{ $product->name }}</td>
                        <td class="py-3 px-4 text-bronze">{{ $product->category->name }}</td>
                        <td class="py-3 px-4 text-espresso">{{ persian_price($product->final_price) }}</td>
                        <td class="py-3 px-4">
                            @if($product->stock > 0)
                                <span class="text-green-700">{{ persian_number($product->stock) }}</span>
                            @else
                                <span class="text-red-500">ناموجود</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($product->is_active)
                                <span class="text-xs px-2 py-1 rounded-full bg-green-50 text-green-700">فعال</span>
                            @else
                                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-500">غیرفعال</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-gold hover:underline text-xs">ویرایش</a>
                                <form action="{{ route('admin.products.delete', $product) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-xs">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection
