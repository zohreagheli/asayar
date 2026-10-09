@extends('store.admin.layout')

@section('title', 'خبرنامه | پنل مدیریت نگووید')

@section('content')
<h1 class="text-2xl font-medium text-espresso mb-6">اعضای خبرنامه</h1>

<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-bronze text-xs border-b border-dust">
                    <th class="text-right py-3 px-4">ایمیل</th>
                    <th class="text-right py-3 px-4">تاریخ عضویت</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscribers as $subscriber)
                    <tr class="border-b border-dust/40 hover:bg-sand/30">
                        <td class="py-3 px-4 text-espresso" dir="ltr">{{ $subscriber->email }}</td>
                        <td class="py-3 px-4 text-bronze text-xs">{{ $subscriber->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">{{ $subscribers->links() }}</div>
@endsection
