<?php

namespace App\Livewire\Admin;

use App\Models\Technician;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class TechnicianManager extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $phone;
    public $expertise;
    public $is_available = true;
    public $image;
    public $currentImage = null;
    public $editingId = null;

    public $showModal = false;
    public $deleteId = null;
    public $showDeleteModal = false;

    public $pageTitle = 'مدیریت تکنسین‌ها';

    public $breadcrumbs = [
        [
            'title' => 'داشبورد',
            'url' => '/dashboard',
        ],
        [
            'title' => 'مدیریت تکنسین‌ها',
            'url' => null,
        ],
    ];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'expertise' => 'nullable|string',
            'is_available' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ];
    }
    protected function messages()
    {
        return [

            'name.required' => 'وارد کردن نام تکنسین الزامی است.',
            'name.max'      => 'نام تکنسین نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            
            'phone.required' => 'وارد کردن شماره تلفن الزامی است.',
            'phone.max'     => 'شماره تلفن نمی‌تواند بیشتر از ۲۰ کاراکتر باشد.',

            'image.image'   => 'فایل انتخاب شده باید تصویر باشد.',
            'image.max'     => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',

        ];
    }

    protected function validationAttributes()
    {
        return [

            'name'         => 'نام تکنسین',
            'phone'        => 'تلفن',
            'expertise'    => 'تخصص',
            'image'        => 'تصویر',
            'is_available' => 'وضعیت',

        ];
    }

    public function create()
    {
        $this->resetForm();

        $this->dispatch('open-modal');
    }

    public function edit($id)
    {
        $tech = Technician::findOrFail($id);

        $this->editingId = $tech->id;
        $this->name = $tech->name;
        $this->phone = $tech->phone;
        $this->expertise = $tech->expertise;
        $this->is_available = $tech->is_available;
        $this->currentImage = $tech->image;
        $this->dispatch('open-modal');
    }

    public function closeModal()
    {
        $this->dispatch('close-modal');
        $this->resetForm();
    }
    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'expertise' => $this->expertise,
            'is_available' => $this->is_available,
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('technicians', 'public');
        }

        if ($this->editingId) {
            Technician::find($this->editingId)->update($data);
            $msg = 'تکنسین ویرایش شد';
        } else {
            Technician::create($data);
            $msg = 'تکنسین ثبت شد';
        }

        $this->resetForm();

        $this->dispatch('close-modal'); // ⭐ این مهمه

        $this->dispatch(
            'show-toast',
            message: $msg,
            type: 'success'
        );
    }

    public function confirmDelete($id)
    {

        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteTechnician()
    {

        try {

            Technician::findOrFail($this->deleteId)->delete();

            $this->showDeleteModal = false;
            $this->deleteId = null;

            $this->dispatch(
                'show-toast',
                message: 'تکنسین حذف شد',
                type: 'success'
            );
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }


    public function resetForm()
    {
        $this->reset([
            'name',
            'phone',
            'expertise',
            'image',
            'editingId',
            'currentImage',
        ]);

        $this->is_available = true;
        $this->showModal = false;
    }

    public function render()
    {
        return view(
            'livewire.admin.technician-manager',
            [
                'technicians' => Technician::latest()
                    ->paginate(10),
            ]
        )->layout(
            'layouts.admin',
            [
                'pageTitle' => $this->pageTitle,
                'breadcrumbs' => $this->breadcrumbs,
            ]
        );
    }
}
