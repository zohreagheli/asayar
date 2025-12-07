<div class="card p-3">
    <div class="app-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-primary">لیست نوبت ها</h4>
        </div>
        @if ($success)
            <div class="alert alert-success custom-success-alert alert-dismissible fade show">
                <span>{{ $success }}</span>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead style="background:#d9c3f7; color:white;">
                            <tr>
                                <th class="text-center">ردیف</th>
                                <th class="text-center">خدمت</th>
                                <th class="text-center">سرویس‌گیرنده</th>
                                <th class="text-center">سرویس‌کار</th>
                                <th class="text-center">تاریخ و زمان</th>
                                <th class="text-center">وضعیت</th>

                                @if (auth()->check() && auth()->user()->role === 'admin')
                                    <th class="text-center">اقدامات</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($appointments as $appointment)
                                <tr>
                                    <td class="align-middle text-center">
                                        {{ $this->convertToPersianNumbers($appointment->row_number) }}
                                    </td>

                                    <td class="align-middle text-center text-truncate" style="max-width:150px;">
                                        {{ $appointment->service->name }}
                                    </td>

                                    <td class="align-middle text-center text-truncate" style="max-width:120px;">
                                        {{ $appointment->user ? $appointment->user->name : '-' }}
                                    </td>

                                    <td class="align-middle text-center text-truncate" style="max-width:120px;">
                                        {{ $appointment->technician ? $appointment->technician->name : '-' }}
                                    </td>

                                    <td class="align-middle text-center">
                                        {{ $this->convertToPersianNumbers($appointment->persian_date) }}
                                    </td>

                                    <td class="align-middle text-center">
                                        @php
                                            $statusClass =
                                                [
                                                    'pending' => 'bg-warning text-dark',
                                                    'confirmed' => 'bg-success text-white',
                                                    'canceled' => 'bg-danger text-white',
                                                ][$appointment->status] ?? 'bg-secondary text-white';
                                        @endphp
                                        <span class="badge {{ $statusClass }}">
                                            {{ $this->getPersianStatus($appointment->status) }}
                                        </span>
                                    </td>

                                    @if (auth()->check() && auth()->user()->role === 'admin')
                                        <td class="align-middle text-center" style="min-width:150px;">
                                            <div class="d-flex justify-content-center gap-3">

                                                <!-- تأیید -->
                                                <i class="fa-solid fa-circle-check text-success fs-5" title="تأیید"
                                                    wire:click="updateStatus({{ $appointment->id }}, 'confirmed')"></i>

                                                <!-- در انتظار -->
                                                <i class="fa-solid fa-clock text-warning fs-5" title="در انتظار"
                                                    wire:click="updateStatus({{ $appointment->id }}, 'pending')"></i>

                                                <!-- لغو -->
                                                <i class="fa-solid fa-circle-xmark text-danger fs-5" title="لغو"
                                                    wire:click="updateStatus({{ $appointment->id }}, 'canceled')"></i>

                                            </div>
                                        </td>
                                    @endif

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? 7 : 6 }}"
                                        class="text-center py-4">
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
