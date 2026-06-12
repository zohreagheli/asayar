<?php

namespace App\Livewire\Admin;

use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class GalleryManager extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $image;
    public $title;

    public $editingId = null;

    public $showDeleteModal = false;
    public $deleteId = null;

    public $pageTitle = 'مدیریت گالری تصاویر';

    public $breadcrumbs = [
        [
            'title' => 'داشبورد',
            'url' => '/dashboard',
        ],
        [
            'title' => 'گالری تصاویر',
            'url' => null,
        ],
    ];

    protected function rules()
    {
        return [
            'image' => $this->editingId
                ? 'nullable|image|max:2048'
                : 'required|image|max:2048',

            'title' => 'required|string|max:255',
        ];
    }

    protected function messages()
{
    return [

        'image.required' => 'انتخاب تصویر الزامی است.',
        'image.image'    => 'فایل انتخاب شده باید تصویر باشد.',
        'image.max'      => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',

        'title.max'      => 'عنوان تصویر نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
         'title.required'=>'عنوان تصویر نمی تواند خالی باشد',

    ];
}

protected function validationAttributes()
{
    return [

        'image' => 'تصویر',
        'title' => 'عنوان تصویر',

    ];
}

    public function create()
    {
        $this->resetForm();

        $this->dispatch('open-modal');
    }

    public function edit($id)
    {
        $image = GalleryImage::findOrFail($id);

        $this->editingId = $image->id;
        $this->title = $image->title;

        $this->dispatch('open-modal');
    }

    public function save()
    {
        $this->resetErrorBag();
        $this->validate();

        if ($this->editingId) {

            $gallery = GalleryImage::findOrFail($this->editingId);

            $data = [
                'title' => $this->title,
            ];

            if ($this->image) {

                Storage::disk('public')->delete($gallery->image);

                $data['image'] = $this->image->store('gallery', 'public');
            }

            $gallery->update($data);

            $message = 'تصویر ویرایش شد';
        } else {

            GalleryImage::create([
                'image' => $this->image->store('gallery', 'public'),
                'title' => $this->title,
            ]);

            $message = 'تصویر با موفقیت اضافه شد';
        }

        $this->dispatch('close-modal');

        $this->resetForm();

        $this->dispatch(
            'show-toast',
            message: $message,
            type: 'success'
        );
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteImage()
    {
        $image = GalleryImage::findOrFail($this->deleteId);

        Storage::disk('public')->delete($image->image);

        $image->delete();

        $this->showDeleteModal = false;

        $this->dispatch(
            'show-toast',
            message: 'تصویر حذف شد',
            type: 'success'
        );
    }

    private function resetForm()
    {
        $this->reset([
            'image',
            'title',
            'editingId',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.gallery-manager', [
            'gallery' => GalleryImage::latest()->paginate(12),
        ])->layout(
            'layouts.admin',
            [
                'pageTitle' => $this->pageTitle,
                'breadcrumbs' => $this->breadcrumbs,
            ]
        );
    }
}
