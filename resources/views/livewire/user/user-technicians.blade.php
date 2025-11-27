<div class="container mt-4">
      <div class="app-content">
    <div class="row">
        @forelse($technicians as $technician)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                   {{-- بخش تصویر --}}
            <div class="card-img-top image-box" style="height: 220px; background-color: #f5f5f5; display: flex; align-items: center; justify-content: center;">
              @if($technician->image)
                <img src="{{ asset('storage/'.$technician->image) }}"
                     alt="تصویر سرویسکار"
                     style="max-height: 100%; max-width: 100%; object-fit: cover;">
              @endif
            </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $technician->name }}</h5>
                        <p class="card-text">
                            تلفن: {{ $technician->phone }}<br>
                            تخصص: {{ $technician->expertise ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
    <div class="col-12 d-flex justify-content-center align-items-center" style="height: 60vh;">
        <div class="card p-4 text-center"
             style="max-width: 420px; background:#6f42c1 !important; color:rgb(16, 16, 16); border-radius: 12px;">

            <h5 class="mb-0">شما هنوز از هیچ سرویسکاری خدمات نگرفته‌اید</h5>
        </div>
    </div>

        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $technicians->links() }}
    </div>
</div>
