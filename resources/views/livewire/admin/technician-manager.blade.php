<div>
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-11">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h5 class="mb-0 fw-bold">
                        </h5>

                        <button class="btn btn-primary btn-sm px-3 py-1" wire:click="create">

                            <i class="fa-solid fa-plus ms-1"></i>

                            افزودن تکنسین

                        </button>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead
                                style="
                background:#896dbd;
                color:#fff;
            ">

                                <tr>

                                    <th class="text-center">
                                        #
                                    </th>

                                    <th class="text-center">
                                        تصویر
                                    </th>

                                    <th class="text-center">
                                        نام
                                    </th>

                                    <th class="text-center">
                                        تلفن
                                    </th>

                                    <th class="text-center">
                                        تخصص
                                    </th>

                                    <th class="text-center">
                                        وضعیت
                                    </th>

                                    <th class="text-center">
                                        عملیات
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($technicians as $tech)
                                    <tr>

                                        <td class="text-center">
                                            {{ ($technicians->currentPage() - 1) * $technicians->perPage() + $loop->iteration }}
                                        </td>

                                        <td class="text-center">

                                            @if ($tech->image)
                                                <img src="{{ asset('storage/' . $tech->image) }}"
                                                    class="rounded-circle border" width="55" height="55">
                                            @else
                                                <img src="{{ asset('assets/images/default-avatar.jpg') }}"
                                                    class="rounded-circle border" width="55" height="55">
                                            @endif

                                        </td>

                                        <td class="text-center">
                                            {{ $tech->name }}
                                        </td>

                                        <td class="text-center">
                                            {{ persian_numbers($tech->phone) }}
                                        </td>

                                        <td class="text-center">
                                            {{ $tech->expertise }}
                                        </td>

                                        <td class="text-center">

                                            <span class="badge bg-{{ $tech->is_available ? 'success' : 'secondary' }}">

                                                {{ $tech->is_available ? 'فعال' : 'غیرفعال' }}

                                            </span>

                                        </td>

                                        <td class="text-center">

                                            <div class="d-flex justify-content-center gap-3">

                                                <i class="fa-solid fa-pen-to-square text-warning fs-5"
                                                    style="cursor:pointer" wire:click="edit({{ $tech->id }})">
                                                </i>

                                                <i class="fa-solid fa-trash text-danger fs-5" style="cursor:pointer"
                                                    wire:click="confirmDelete({{ $tech->id }})">
                                                </i>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            تکنسینی ثبت نشده است

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-4">

                        {{ $technicians->links() }}

                    </div>

                </div>

            </div>

        </div>




        <div wire:ignore.self class="modal fade" id="technicianModal" tabindex="-1" aria-hidden="true">

            <div class="modal-dialog modal-md modal-dialog-centered">

                <div class="modal-content border-0 shadow rounded-3">

                    {{-- Header --}}
                    <div class="modal-header py-2 px-3 bg-primary text-white">

                        <h6 class="modal-title fw-bold mb-0">
                            {{ $editingId ? 'ویرایش تکنسین' : 'افزودن تکنسین جدید' }}
                        </h6>

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                        </button>

                    </div>

                    {{-- Body --}}
                    <div class="modal-body p-3">

                        <div class="row g-2">

                            {{-- نام --}}
                            <div class="col-12">
                                <label class="form-label small fw-bold">
                                    نام تکنسین
                                </label>

                                <input type="text" class="form-control form-control-sm" wire:model.defer="name">

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{-- تلفن --}}
                            <div class="col-12">
                                <label class="form-label small fw-bold">
                                    تلفن
                                </label>

                                <input type="text" class="form-control form-control-sm" wire:model.defer="phone">
                                @error('phone')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{-- تخصص --}}
                            <div class="col-12">
                                <label class="form-label small fw-bold">
                                    تخصص
                                </label>

                                <input type="text" class="form-control form-control-sm" wire:model.defer="expertise">
                            </div>

                            {{-- وضعیت --}}
                            <div class="col-12">
                                <label class="form-label small fw-bold">
                                    وضعیت
                                </label>

                                <select class="form-select form-select-sm" wire:model.defer="is_available">

                                    <option value="1">
                                        فعال
                                    </option>

                                    <option value="0">
                                        غیرفعال
                                    </option>

                                </select>
                            </div>

                            {{-- تصویر --}}
                            <div class="col-12">

                                <label class="form-label small fw-bold">
                                    تصویر تکنسین
                                </label>

                                <input type="file" class="form-control form-control-sm" wire:model="image"
                                    accept="image/*">

                                @error('image')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            {{-- پیش نمایش تصویر --}}
                            @if ($image)
                                <div class="col-12 text-center mt-2">

                                    <img src="{{ $image->temporaryUrl() }}" class="rounded-circle border shadow-sm"
                                        width="90" height="90" style="object-fit:cover">
                                @elseif ($currentImage)
                                    <div class="col-12 text-center mt-2">

                                        <img src="{{ asset('storage/' . $currentImage) }}"
                                            class="rounded-circle border shadow-sm" width="90" height="90"
                                            style="object-fit:cover">

                                    </div>
                            @endif

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="modal-footer py-2 px-3">

                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">

                            انصراف

                        </button>

                        <button type="button" class="btn btn-sm btn-primary" wire:click="save">

                            <i class="fa-solid fa-floppy-disk ms-1"></i>

                            {{ $editingId ? 'ذخیره تغییرات' : 'ثبت تکنسین' }}

                        </button>

                    </div>

                </div>

            </div>

        </div>

        @if ($showDeleteModal)
            <div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,.5);z-index:99999;">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content rounded-4">

                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">تایید حذف</h5>
                        </div>

                        <div class="modal-body text-center py-4">
                            آیا از حذف این تکنسین مطمئن هستید؟
                        </div>

                        <div class="modal-footer">

                            <button class="btn btn-secondary" wire:click="$set('showDeleteModal', false)">
                                انصراف
                            </button>

                            <button class="btn btn-danger" wire:click="deleteTechnician">
                                حذف
                            </button>

                        </div>

                    </div>

                </div>

            </div>
        @endif
    </div>
