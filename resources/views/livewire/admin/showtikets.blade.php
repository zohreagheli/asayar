<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-11">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="text-primary fw-bold mb-0">
                        جزئیات تیکت
                    </h4>

                    <a href="{{ route('tickets.list') }}"
                       class="btn btn-light btn-sm rounded-pill px-3">
                        ← بازگشت
                    </a>

                </div>

                {{-- INFO BOX --}}
                <div class="bg-light p-3 rounded-3 mb-4">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="small text-muted">عنوان</div>
                            <div class="fw-semibold">{{ $ticket->title }}</div>
                        </div>

                        <div class="col-md-3">
                            <div class="small text-muted">دسته‌بندی</div>
                            <span class="badge bg-primary">
                                {{ $ticket->category }}
                            </span>
                        </div>

                        <div class="col-md-3">
                            <div class="small text-muted">تاریخ ایجاد</div>
                            <div class="fw-semibold">
                                {{ \Morilog\Jalali\Jalalian::fromDateTime($ticket->created_at)->format('Y/m/d H:i') }}
                            </div>
                        </div>

                    </div>

                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-4">

                    <div class="small text-muted mb-1">توضیحات</div>

                    <div class="p-3 border rounded-3 bg-white">
                        {{ $ticket->description }}
                    </div>

                </div>

                {{-- ATTACHMENT --}}
                @if($ticket->attachment_path)

                    <div class="mb-4">

                        <div class="small text-muted mb-2">ضمیمه</div>

                        @php
                            $fileUrl = asset('storage/' . $ticket->attachment_path);
                            $fileExt = pathinfo($ticket->attachment_path, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($fileExt, ['jpg','jpeg','png','gif']))
                            <img src="{{ $fileUrl }}"
                                 class="img-fluid rounded-3 border mb-2"
                                 style="max-width: 350px;">
                        @endif

                        <div>
                            <a href="{{ $fileUrl }}"
                               target="_blank"
                               class="btn btn-outline-primary btn-sm rounded-pill">
                                دانلود فایل
                            </a>
                        </div>

                    </div>

                @endif

                <hr>

                {{-- ADMIN REPLY --}}
                <div class="mt-4">

                    <h6 class="fw-bold mb-3">پاسخ ادمین</h6>

                    @if(auth()->check() && auth()->user()->role === 'admin')

                        <textarea wire:model="adminReply"
                                  class="form-control rounded-3 mb-3"
                                  rows="4"
                                  placeholder="پاسخ خود را بنویسید..."></textarea>

                        <button wire:click="saveReply"
                                class="btn btn-success px-4 rounded-pill">
                            ثبت پاسخ
                        </button>

                       

                        @if($ticket->admin_reply)
                            <div class="alert alert-info rounded-3">
                                {{ $ticket->admin_reply }}
                            </div>
                        @else
                            <p class="text-muted">هنوز پاسخی ثبت نشده است.</p>
                        @endif

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>
