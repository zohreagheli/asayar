<div class="card p-3">
    <div class="app-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-primary">لیست تیکت‌ها</h4>

        </div>

       <table class="table table-striped table-bordered text-center align-middle">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>عنوان</th>
            <th>دسته‌بندی</th>
            <th>تاریخ ایجاد</th>
            <th>ضمیمه</th>
            <th>جزئیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $index => $ticket)
        <tr>
            <td>{{ ($tickets->currentPage()-1) * $tickets->perPage() + $index + 1 }}</td>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->category }}</td>
            <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($ticket->created_at)->format('Y/m/d H:i') }}</td>
            <td>
                @if($ticket->attachment_path)
                    @php
                        $fileUrl = asset('storage/' . $ticket->attachment_path);
                        $fileExt = pathinfo($ticket->attachment_path, PATHINFO_EXTENSION);
                    @endphp

                    @if(in_array($fileExt, ['jpg','jpeg','png','gif']))
                        <a href="{{ $fileUrl }}" target="_blank">
                            <img src="{{ $fileUrl }}" alt="Attachment" style="max-width: 60px; max-height: 60px;">
                        </a>
                    @else
                        <a href="{{ $fileUrl }}" target="_blank" class="btn btn-sm btn-primary">
                            دانلود
                        </a>
                    @endif
                @else
                    <span class="text-muted">ندارد</span>
                @endif
            </td>
            <td>
                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-primary">
                    مشاهده
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


        <div class="mt-3">
            {{ $tickets->links() }}
        </div>
    </div>
</div>
