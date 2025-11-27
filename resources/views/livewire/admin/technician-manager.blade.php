<div class="container mt-5" dir="rtl">
      <div class="app-content">
    <h3 class="mb-4 text-center fw-bold">مدیریت تکنسین‌ها</h3>

    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <!-- فرم افزودن یا ویرایش -->
    <form wire:submit.prevent="{{ $editingId ? 'update' : 'save' }}" class="card p-4 mb-5 shadow-sm">
        <h5 class="fw-bold mb-3 text-center">
            {{ $editingId ? 'ویرایش تکنسین' : 'افزودن تکنسین جدید' }}
        </h5>

        <div class="row g-3">
            <div class="col-md-4">
                <label>نام</label>
                <input type="text" class="form-control" wire:model="name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-md-4">
                <label>تلفن</label>
                <input type="text" class="form-control" wire:model="phone">
            </div>

            <div class="col-md-4">
                <label>تخصص</label>
                <input type="text" class="form-control" wire:model="expertise">
            </div>

            <div class="col-md-4">
                <label>وضعیت فعالیت</label>
                <select class="form-select" wire:model="is_available">
                    <option value="1">فعال</option>
                    <option value="0">غیرفعال</option>
                </select>
            </div>

            <div class="col-md-4">
                <label>تصویر</label>
                <input type="file" class="form-control" wire:model="image">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="mt-2 rounded" width="100">
                @elseif ($editingId)
                    @php
                        $tech = $technicians->where('id', $editingId)->first();
                    @endphp
                    @if ($tech && $tech->image)
                        <img src="{{ asset('storage/' . $tech->image) }}" class="mt-2 rounded" width="100">
                    @endif
                @endif
            </div>

            <div class="col-md-12 text-center mt-3">
                <button class="btn btn-primary px-5">
                    {{ $editingId ? 'ذخیره تغییرات' : 'افزودن تکنسین' }}
                </button>
                @if ($editingId)
                    <button type="button" class="btn btn-secondary px-4 ms-2" wire:click="resetForm">
                        انصراف
                    </button>
                @endif
            </div>
        </div>
    </form>

   <div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white fw-bold text-center">
        فهرست تکنسین‌ها
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center m-0" style="border: 1px solid #ccc;">
            <thead class="table-dark">
                <tr>
                    <th>تصویر</th>
                    <th>نام</th>
                    <th>تلفن</th>
                    <th>تخصص</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technicians as $tech)
                    <tr>
                        <td>
                            @if ($tech->image)
                                <img src="{{ asset('storage/' . $tech->image) }}" width="60" class="rounded shadow-sm border">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $tech->name }}</td>
                        <td>{{ $tech->phone }}</td>
                        <td>{{ $tech->expertise }}</td>
                        <td>
                            <span class="badge bg-{{ $tech->is_available ? 'success' : 'secondary' }}">
                                {{ $tech->is_available ? 'فعال' : 'غیرفعال' }}
                            </span>
                        </td>
                        <td>
                            <button wire:click="edit({{ $tech->id }})" class="btn btn-sm btn-warning">
                                ✏️ ویرایش
                            </button>
                            <button wire:click="delete({{ $tech->id }})" class="btn btn-sm btn-danger">
                                🗑 حذف
                            </button>
                        </td>
                    </tr>
                @endforeach

                @if ($technicians->isEmpty())
                    <tr>
                        <td colspan="6" class="text-muted text-center py-4">هیچ تکنسینی ثبت نشده است.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- صفحه‌بندی -->
    <div class="card-footer bg-light text-center">
        {{ $technicians->links() }}
    </div>
</div>
</div>

</div>
