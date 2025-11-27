<div class="container py-4">
    <div class="app-content">
        <h2 class="mb-4 text-center">مدیریت گالری تصاویر</h2>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

       <form wire:submit.prevent="save" enctype="multipart/form-data" class="mb-4">
    @foreach($images as $index => $img)
        <div class="mb-2 d-flex gap-2 align-items-center">
            <span>{{ $img->getClientOriginalName() }}</span>
            <input type="text" wire:model.defer="titles.{{ $index }}" class="form-control" placeholder="عنوان تصویر...">
        </div>
    @endforeach

    <div class="mb-3">
        <input type="file" wire:model="images" multiple class="form-control">
        @error('images.*') <span class="text-danger">{{ $message }}</span> @enderror
        @error('titles.*') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">افزودن تصاویر</button>
</form>


        <!-- نمایش تصاویر -->
        <div class="row">
            @forelse ($gallery as $item)
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="image">

                        <div class="card-body text-center">
                            @if ($editId === $item->id)
                                <input type="text" wire:model.defer="titles.{{ $item->id }}" class="form-control mb-2" placeholder="عنوان جدید...">
                                <button wire:click="update({{ $item->id }})" class="btn btn-success btn-sm">ذخیره</button>
                                <button wire:click="$set('editId', null)" class="btn btn-secondary btn-sm">انصراف</button>
                            @else
                                <h6 class="card-title">{{ $item->title ?? 'بدون عنوان' }}</h6>
                                <button wire:click="edit({{ $item->id }})" class="btn btn-warning btn-sm">ویرایش</button>
                                <button wire:click="delete({{ $item->id }})" class="btn btn-danger btn-sm" onclick="return confirm('آیا از حذف مطمئنی؟')">حذف</button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">هیچ تصویری در گالری وجود ندارد.</p>
            @endforelse
        </div>
    </div>
</div>
