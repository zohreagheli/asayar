@extends('store.admin.layout')

@section('title', 'نظرات | پنل مدیریت نگووید')

@section('content')
<h1 class="text-2xl font-medium text-espresso mb-6">مدیریت نظرات</h1>

<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-bronze text-xs border-b border-dust">
                    <th class="text-right py-3 px-4">نام</th>
                    <th class="text-right py-3 px-4">امتیاز</th>
                    <th class="text-right py-3 px-4">پیام</th>
                    <th class="text-right py-3 px-4">وضعیت</th>
                    <th class="text-right py-3 px-4">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr class="border-b border-dust/40 hover:bg-sand/30">
                        <td class="py-3 px-4 text-espresso">
                            {{ $testimonial->name }}
                            @if($testimonial->is_test_content)
                                <span class="text-xs text-dust mr-1">(آزمایشی)</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gold">{{ str_repeat('★', $testimonial->rating) }}</td>
                        <td class="py-3 px-4 text-bronze max-w-xs truncate">{{ $testimonial->message }}</td>
                        <td class="py-3 px-4">
                            @if($testimonial->is_approved)
                                <span class="text-xs px-2 py-1 rounded-full bg-green-50 text-green-700">تأیید شده</span>
                            @else
                                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-500">در انتظار</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-gold hover:underline text-xs">{{ $testimonial->is_approved ? 'لغو تأیید' : 'تأیید' }}</button>
                                </form>
                                <form action="{{ route('admin.testimonials.delete', $testimonial) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
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

<div class="mt-4">{{ $testimonials->links() }}</div>
@endsection
