@extends('store.admin.layout')

@section('title', 'دسته‌بندی‌ها | پنل مدیریت نگووید')

@section('content')
<h1 class="text-2xl font-medium text-espresso mb-6">مدیریت دسته‌بندی‌ها</h1>

<div class="card p-6 mb-6">
    <h2 class="text-lg font-medium text-espresso mb-4 pb-2 border-b border-dust">افزودن دسته‌بندی جدید</h2>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
        @csrf
        <input type="text" name="name" placeholder="نام دسته‌بندی" required class="flex-1">
        <input type="number" name="sort_order" placeholder="ترتیب" class="w-32">
        <button type="submit" class="btn-admin whitespace-nowrap">افزودن</button>
    </form>
</div>

<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-bronze text-xs border-b border-dust">
                    <th class="text-right py-3 px-4">نام</th>
                    <th class="text-right py-3 px-4">تعداد محصولات</th>
                    <th class="text-right py-3 px-4">ترتیب</th>
                    <th class="text-right py-3 px-4">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr class="border-b border-dust/40 hover:bg-sand/30">
                        <td class="py-3 px-4 text-espresso">{{ $cat->name }}</td>
                        <td class="py-3 px-4 text-bronze">{{ persian_number($cat->products->count()) }}</td>
                        <td class="py-3 px-4 text-bronze">{{ persian_number($cat->sort_order) }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('admin.categories.delete', $cat) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-xs">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">{{ $categories->links() }}</div>
@endsection
