<div class="container mt-4">
     <div class="app-content">
    <h2 class="mb-4 text-center">📷 گالری تصاویر</h2>

    <div class="mb-3 text-center position-relative">
        <input wire:model.live="search" type="text" class="form-control w-50 mx-auto"
               placeholder="جستجو بر اساس عنوان تصویر...">

               <div wire:loading wire:target="search"
                class="spinner-border text-primary position-absolute top-50 end-0 translate-middle-y me-5" role="status"
                style="width: 1.5rem; height: 1.5rem;">
                <span class="visually-hidden">در حال جستجو...</span>
            </div>
    </div>


    <div class="row">
        @forelse($images as $image)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-img-top" style="height: 200px; display:flex; align-items:center; justify-content:center; background-color: #f8f9fa;">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}"
                             style="max-width: 100%; max-height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $image->title ?? 'بدون عنوان' }}</h6>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>📭 هیچ تصویری یافت نشد.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $images->links() }}
    </div>
</div>

</div>
