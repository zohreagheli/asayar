<div class="container pb-5">

    <div class="app-content">

        {{-- سرچ --}}
        <div class="mb-4 position-relative">

            <div class="input-group w-50 mx-auto shadow-sm">

                <input
                    type="text"
                    class="form-control"
                    placeholder="جستجو بر اساس عنوان تصویر..."
                    wire:model.live.debounce.500ms="search">

                <span
                    class="input-group-text text-white border-0"
                    style="
                        background:linear-gradient(
                            135deg,
                            #6351a7,
                            #362280
                        );
                        min-width:100px;
                        justify-content:center;
                    ">

                    جستجو

                </span>

            </div>

            {{-- لودر --}}
            <div
                wire:loading.flex
                wire:target="search"
                class="justify-content-center mt-3">

                <div
                    class="spinner-border"
                    style="
                        color:#6351a7;
                        width:1.8rem;
                        height:1.8rem;
                    ">
                </div>

            </div>

        </div>



        {{-- گالری --}}
        <div
            wire:loading.class="opacity-50">

            <div class="row g-4">

                @forelse($images as $image)

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <div
                            class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">

                            <div
                                style="
                                    height:240px;
                                    overflow:hidden;
                                ">

                                <img
                                    src="{{ asset('storage/'.$image->image) }}"
                                    alt="{{ $image->title }}"
                                    class="w-100 h-100"
                                    style="
                                        object-fit:cover;
                                        transition:.3s;
                                    ">

                            </div>

                            <div class="card-body text-center">

                                <h6
                                    class="fw-bold mb-0">

                                    {{ $image->title ?: 'بدون عنوان' }}

                                </h6>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div
                            class="text-center py-5">

                            <i
                                class="fa-solid fa-images fs-1 text-muted mb-3">
                            </i>

                            <p
                                class="text-muted mb-0">

                                تصویری یافت نشد

                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

        {{-- Pagination --}}
        @if($images->hasPages())

          <div class="mt-4">


                {{ $images->links() }}

            </div>

        @endif

    </div>

</div>
