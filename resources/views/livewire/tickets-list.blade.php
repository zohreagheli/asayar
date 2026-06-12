<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-11">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <div class="table-responsive">

                    <table class="table table-hover align-middle text-center">

                        <thead style="background:#896dbd; color:#fff;">
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>دسته‌بندی</th>
                                <th>تاریخ ایجاد</th>
                                <th>ضمیمه</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($tickets as $index => $ticket)
                            <tr>

                                <td>
                                    {{ ($tickets->currentPage()-1)*$tickets->perPage()+$index+1 }}
                                </td>

                                <td>{{ $ticket->title }}</td>

                                <td>{{ $ticket->category }}</td>

                                <td>
                                  {!! jalali_datetime($ticket->created_at) !!}
                                </td>

                                <td>
                                    @if($ticket->attachment_path)
                                        <a href="{{ asset('storage/'.$ticket->attachment_path) }}"
                                           target="_blank"
                                           class="text-decoration-none small text-primary">
                                            مشاهده فایل
                                        </a>
                                    @else
                                        <span class="text-muted">ندارد</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('tickets.show', $ticket->id) }}"
                                       class="text-primary text-decoration-none small fw-semibold">
                                        مشاهده جزئیات
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-muted">
                                    تیکتی ثبت نشده است
                                </td>
                            </tr>
                        @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-4">
                    {{ $tickets->links() }}
                </div>

            </div>

        </div>

    </div>

</div>
