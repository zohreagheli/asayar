<div>

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-11">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h5 class="fw-bold mb-0">
                        </h5>

                        <button class="btn btn-primary btn-sm px-3  py-1" wire:click="create">

                            <i class="fa-solid fa-plus ms-1"></i>

                            افزودن تصویر

                        </button>

                    </div>

                    <div class="row g-4">

                        @forelse($gallery as $item)
                            <div class="col-xl-3 col-lg-4 col-md-6">

                                <div class="card border-0 shadow-sm rounded-4 h-100">

                                    <div class="p-2">

                                        <img src="{{ asset('storage/' . $item->image) }}" class="w-100 rounded-3 border"
                                            style="
                                                height:220px;
                                                object-fit:cover;
                                            ">
                                    </div>

                                    <div class="card-body text-center">

                                        <h6 class="fw-bold mb-3">

                                            {{ $item->title ?: 'بدون عنوان' }}

                                        </h6>

                                        <div class="d-flex justify-content-center gap-3">

                                            <i class="fa-solid fa-pen-to-square text-warning fs-5"
                                                style="cursor:pointer" wire:click="edit({{ $item->id }})">
                                            </i>

                                            <i class="fa-solid fa-trash text-danger fs-5" style="cursor:pointer"
                                                wire:click="confirmDelete({{ $item->id }})">
                                            </i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="col-12">

                                <div class="text-center py-5 text-muted">

                                    تصویری ثبت نشده است

                                </div>

                            </div>
                        @endforelse

                    </div>

                    <div class="mt-4">

                        {{ $gallery->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Modal Add/Edit --}}

    <div wire:ignore.self class="modal fade" id="technicianModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow rounded-4">

                <div class="modal-header bg-primary text-white">

                    <h6 class="mb-0">

                        {{ $editingId ? 'ویرایش تصویر' : 'افزودن تصویر جدید' }}

                    </h6>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            عنوان تصویر

                        </label>

                        <input type="text" class="form-control" wire:model.defer="title">
                        @error('title')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            تصویر

                        </label>

                        <input type="file" class="form-control" wire:model="image">

                        @error('image')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    @if ($image)
                        <div class="text-center">

                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded border"
                                style="max-height:250px">

                        </div>
                    @endif

                </div>

                <div class="modal-footer">

                    <button class="btn btn-light btn-sm" data-bs-dismiss="modal">

                        انصراف

                    </button>

                    <button class="btn btn-primary btn-sm" wire:click="save">

                        <i class="fa-solid fa-floppy-disk ms-1"></i>

                        ذخیره

                    </button>

                </div>

            </div>

        </div>

    </div>

    {{-- Delete Modal --}}

    @if ($showDeleteModal)
        <div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,.5);z-index:99999;">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content rounded-4">

                    <div class="modal-header bg-danger text-white">

                        <h5 class="modal-title">

                            تایید حذف

                        </h5>

                    </div>

                    <div class="modal-body text-center py-4">

                        آیا از حذف این تصویر مطمئن هستید؟

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-secondary" wire:click="$set('showDeleteModal', false)">

                            انصراف

                        </button>

                        <button class="btn btn-danger" wire:click="deleteImage">

                            حذف

                        </button>

                    </div>

                </div>

            </div>

        </div>
    @endif

</div>
