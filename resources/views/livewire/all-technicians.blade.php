<div>

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-11">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    {{-- Search --}}
                    <div class="mb-4 d-flex justify-content-center">



                        <div class="input-group w-50 mx-auto">

                            <input type="text" class="form-control" placeholder="جستجو بر اساس نام یا تخصص..."
                                wire:model.live.debounce.500ms="search">

                            <span class="input-group-text text-white border-0"
                                style="
            background:#6351a7;
            min-width:90px;
            justify-content:center;
        ">
                                جستجو
                            </span>

                        </div>

                    </div>

                </div>

                {{-- Loading --}}
                 <div
        wire:loading.flex
        wire:target="search"
        class="justify-content-center align-items-center position-absolute top-50 start-50 translate-middle"
        style="z-index:999">

        <div class="spinner-border text-primary"
             role="status"
             style="width:2rem;height:2rem">
        </div>

    </div>


                {{-- Cards --}}
                <div wire:loading.class="opacity-50">

                    <div class="row g-4">

                        @forelse($technicians as $technician)
                            <div class="col-xl-3 col-lg-4 col-md-6">

                                <div class="card border-0 shadow-sm rounded-4 h-100">

                                    <div class="p-3">

                                        @if ($technician->image)
                                            <img src="{{ asset('storage/' . $technician->image) }}"
                                                alt="{{ $technician->name }}" class="w-100 rounded-3 border"
                                                style="
                                                        height:240px;
                                                        object-fit:cover;
                                                    ">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center border rounded-3 bg-light"
                                                style="
                                                        height:240px;
                                                    ">

                                                <i class="fa-solid fa-user-gear fs-1 text-muted"></i>

                                            </div>
                                        @endif

                                    </div>

                                    <div class="card-body text-center pt-0">

                                        <h5 class="fw-bold mb-2">

                                            {{ $technician->name }}

                                        </h5>

                                        <div class="text-muted small mb-3">

                                            {{ $technician->expertise ?: 'تخصص ثبت نشده' }}

                                        </div>

                                        <span class="badge bg-success">

                                            سرویسکار فعال

                                        </span>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="col-12">

                                <div class="text-center py-5">

                                    <i class="fa-solid fa-user-slash fs-1 text-muted mb-3"></i>

                                    <div class="text-muted">

                                        سرویسکاری با این مشخصات پیدا نشد

                                    </div>

                                </div>

                            </div>
                        @endforelse

                    </div>

                </div>



                {{-- Pagination --}}
                @if ($technicians->hasPages())
                    <div class="mt-4">

                        {{ $technicians->links() }}

                    </div>
                @endif

            </div>

        </div>

    </div>

</div>

</div>
