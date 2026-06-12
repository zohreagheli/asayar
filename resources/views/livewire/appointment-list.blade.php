<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-11">



        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">



                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead
                            style="
                                background: #896dbd;
                                color: #fff;
                            ">

                            <tr>

                                <th class="text-center">
                                    ردیف
                                </th>

                                <th class="text-center">
                                    خدمت
                                </th>

                                <th class="text-center">
                                    سرویس‌گیرنده
                                </th>

                                <th class="text-center">
                                    تاریخ مراجعه
                                </th>

                                <th class="text-center">
                                    بازه زمانی
                                </th>

                                <th class="text-center">
                                    وضعیت
                                </th>

                                @if (auth()->check() && auth()->user()->role === 'admin')
                                    <th class="text-center">
                                        اقدامات
                                    </th>
                                @endif

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($appointments as $appointment)
                                <tr>

                                    <td class="text-center">

                                        {{ persian_numbers($loop->iteration + ($appointments->currentPage() - 1) * $appointments->perPage()) }}

                                    </td>

                                    <td class="text-center">

                                        {{ $appointment->service?->name ?? '-' }}

                                    </td>

                                    <td class="text-center">

                                        {{ $appointment->user?->name ?? '-' }}

                                    </td>

                                    <td class="text-center">


                                        {{ persian_numbers(jalali_date($appointment->preferred_date)) }}

                                    </td>

                                    <td class="text-center">

                                        {{ persian_numbers($appointment->preferred_time) }}

                                    </td>

                                    <td class="text-center">

                                        <span class="badge bg-{{ $appointment->status->badge() }}">
                                            {{ $appointment->status->label() }}
                                        </span>

                                    </td>
                                    @if (auth()->check() && auth()->user()->role === 'admin')
                                        <td class="text-center">

                                            <div class="row g-2 justify-content-center text-center" style="width:100px">

                                                <div class="col-4">
                                                    <i class="fa-solid fa-clock text-warning fs-5" title="در انتظار"
                                                        style="cursor:pointer"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'pending')">
                                                    </i>
                                                </div>

                                                <div class="col-4">
                                                    <i class="fa-solid fa-user-check text-info fs-5"
                                                        title="تخصیص داده شده" style="cursor:pointer"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'assigned')">
                                                    </i>
                                                </div>

                                                <div class="col-4">
                                                    <i class="fa-solid fa-circle-check text-primary fs-5"
                                                        title="تایید شده" style="cursor:pointer"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'accepted')">
                                                    </i>
                                                </div>

                                                <div class="col-4">
                                                    <i class="fa-solid fa-screwdriver-wrench text-secondary fs-5"
                                                        title="در حال انجام" style="cursor:pointer"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'in_progress')">
                                                    </i>
                                                </div>

                                                <div class="col-4">
                                                    <i class="fa-solid fa-circle-check text-success fs-5"
                                                        title="انجام شده" style="cursor:pointer"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'completed')">
                                                    </i>
                                                </div>

                                                <div class="col-4">
                                                    <i class="fa-solid fa-circle-xmark text-danger fs-5" title="لغو شده"
                                                        style="cursor:pointer"
                                                        wire:click="updateStatus({{ $appointment->id }}, 'cancelled')">
                                                    </i>
                                                </div>

                                            </div>

                                        </td>
                                    @endif

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="{{ auth()->check() && auth()->user()->role === 'admin' ? 7 : 6 }}"
                                        class="text-center py-4">

                                        هنوز درخواستی ثبت نشده است

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
