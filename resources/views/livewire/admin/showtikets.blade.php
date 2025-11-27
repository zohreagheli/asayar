<div class="card p-3">
    <div class="app-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-primary">جزئیات تیکت</h4>
            <a href="{{ route('tickets.list') }}" class="btn btn-secondary btn-sm">بازگشت به لیست</a>
        </div>

        <div class="mb-3">
            <p><strong>عنوان:</strong> {{ $ticket->title }}</p>
            <p><strong>دسته‌بندی:</strong> {{ $ticket->category }}</p>
            <p><strong>توضیحات:</strong> {{ $ticket->description }}</p>
            <p><strong>تاریخ ایجاد:</strong> {{ \Morilog\Jalali\Jalalian::fromDateTime($ticket->created_at)->format('Y/m/d H:i') }}</p>

            @if($ticket->attachment_path)
                <div class="mt-3">
                    <p><strong>ضمیمه:</strong></p>
                    @php
                        $fileUrl = asset('storage/' . $ticket->attachment_path);
                        $fileExt = pathinfo($ticket->attachment_path, PATHINFO_EXTENSION);
                    @endphp

                    @if(in_array($fileExt, ['jpg','jpeg','png','gif']))
                        <img src="{{ $fileUrl }}" alt="Attachment" class="img-fluid mb-2" style="max-width: 400px;">
                    @endif

                    <div>
                        <a href="{{ $fileUrl }}" target="_blank" class="btn btn-primary btn-sm">
                            دانلود فایل
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <hr>
        <h5>پاسخ ادمین:</h5>

        @if(auth()->check() && auth()->user()->role === 'admin')
            <textarea wire:model="adminReply" class="form-control mb-2" rows="4"></textarea>
            <button wire:click="saveReply" class="btn btn-success">ثبت پاسخ</button>
            @if(session()->has('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif
        @else
            @if($ticket->admin_reply)
                <div class="alert alert-info">{{ $ticket->admin_reply }}</div>
            @else
                <p class="text-muted">هنوز پاسخی داده نشده است.</p>
            @endif
        @endif
    </div>
</div>
