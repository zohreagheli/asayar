<div class="container">
    <h2 class="mb-4 text-center">لیست نوبت‌های شما</h2>

    <!-- پیام موفقیت لایو وایر -->
    @if ($success)
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3"
             style="z-index: 9999; max-width: 90%;">
            <div class="d-flex justify-content-between align-items-center">
                <span>{{ $success }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="app-content">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">ردیف</th>
                                <th class="text-center">خدمت</th>
                                <th class="text-center">سرویس‌کار</th>
                                <th class="text-center">تاریخ و زمان</th>
                                <th class="text-center status-col">وضعیت</th>
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                    <th class="text-center actions-col">اقدامات</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $appointment)
                                <tr>
                                    <td class="align-middle text-center">{{ $this->convertToPersianNumbers($appointment->row_number) }}</td>
                                    <td class="align-middle text-truncate" style="max-width: 150px;">{{ $appointment->service->name }}</td>
                                    <td class="align-middle text-center text-truncate" style="max-width: 120px;">{{ $appointment->technician ? $appointment->technician->name : '-' }}</td>
                                    <td class="align-middle text-center">{{ $this->convertToPersianNumbers($appointment->persian_date) }}</td>
                                    <td class="align-middle text-center text-truncate" style="max-width: 120px;">
                                        @php
                                            $statusClass = [
                                                'pending' => 'bg-warning text-dark',
                                                'confirmed' => 'bg-success text-white',
                                                'canceled' => 'bg-danger text-white',
                                            ][$appointment->status] ?? 'bg-secondary text-white';
                                        @endphp
                                        <span class="badge {{ $statusClass }}">
                                            {{ $this->getPersianStatus($appointment->status) }}
                                        </span>
                                    </td>

                                    @if(auth()->check() && auth()->user()->role === 'admin')
                                        <td class="align-middle text-center text-truncate" style="min-width: 200px;">
                                            <div class="btn-group" role="group" aria-label="actions">
                                                <button class="btn btn-sm btn-success"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'confirmed')"
                                                        onclick="return confirm('آیا مطمئنید وضعیت را به تأیید شده تغییر می‌دهید؟')">
                                                    تأیید
                                                </button>
                                                <button class="btn btn-sm btn-warning"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'pending')"
                                                        onclick="return confirm('آیا وضعیت را به در انتظار تغییر می‌دهید؟')">
                                                    در انتظار
                                                </button>
                                                <button class="btn btn-sm btn-danger"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'canceled')"
                                                        onclick="return confirm('آیا مطمئنید می‌خواهید نوبت را لغو کنید؟')">
                                                    لغو
                                                </button>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? 6 : 5 }}" class="text-center py-4">
                                        هنوز نوبتی ثبت نشده است
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

