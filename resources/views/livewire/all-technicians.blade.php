<div class="container mt-4">
    <div class="app-content">
          <h2 class="mb-4 text-center">تمام سرویسکاران</h2>

        <!-- جستجو -->
        <div class="mb-3  text-center position-relative">
            <input type="text" class="form-control w-50 mx-auto" placeholder="جستجو بر اساس نام یا تخصص..."
                wire:model.live="search">

            <!-- لودینگ اسپینر -->
            <div wire:loading wire:target="search"
                class="spinner-border text-primary position-absolute top-50 end-0 translate-middle-y me-5" role="status"
                style="width: 1.5rem; height: 1.5rem;">
                <span class="visually-hidden">در حال جستجو...</span>
            </div>
        </div>

        <!-- نتایج -->
        <div wire:loading.class="opacity-50">
            <div class="row">
                @forelse($technicians as $technician)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-img-top image-box"
                                style="height: 220px; background-color: #f5f5f5; display: flex; align-items: center; justify-content: center;">
                                @if ($technician->image)
                                    <img src="{{ asset('storage/' . $technician->image) }}" alt="{{ $technician->name }}"
                                        style="max-height: 100%; max-width: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $technician->name }}</h5>
                                <p class="card-text">{{ $technician->expertise ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>سرویسکاری با این عنوان ثبت نشده است.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="mt-3">
            {{ $technicians->links() }}
        </div>
    </div>
</div>
