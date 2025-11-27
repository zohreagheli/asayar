<?php

namespace App\Livewire\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Technician;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class TechnicianManager extends Component
{
    use WithFileUploads, WithPagination;
     protected $paginationTheme = 'bootstrap';

    public $name, $phone, $expertise, $is_available = true, $image;
    
    public $editingId = null; // شناسه‌ی تکنسینی که در حال ویرایش است

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'expertise' => 'nullable|string',
        'is_available' => 'boolean',
        'image' => 'nullable|image|max:1024', // حداکثر ۱ مگابایت
    ];

    public function resetForm()
    {
        $this->reset(['name', 'phone', 'expertise', 'is_available', 'image', 'editingId']);
    }

    public function save()
    {
        $this->validate();

        $path = $this->image ? $this->image->store('technicians', 'public') : null;

        Technician::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'expertise' => $this->expertise,
            'is_available' => $this->is_available,
            'image' => $path,
        ]);

        $this->resetForm();
        session()->flash('message', '✅ تکنسین با موفقیت اضافه شد.');
    }

    public function edit($id)
    {
        $tech = Technician::findOrFail($id);
        $this->editingId = $id;
        $this->name = $tech->name;
        $this->phone = $tech->phone;
        $this->expertise = $tech->expertise;
        $this->is_available = $tech->is_available;
        $this->image = null;
    }

    public function update()
    {
        $this->validate();

        $tech = Technician::findOrFail($this->editingId);
        $path = $tech->image;

        if ($this->image) {
            $path = $this->image->store('technicians', 'public');
        }

        $tech->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'expertise' => $this->expertise,
            'is_available' => $this->is_available,
            'image' => $path,
        ]);

        $this->resetForm();
        session()->flash('message', '📝 تغییرات با موفقیت ذخیره شد.');
    }

    public function delete($id)
    {
        Technician::findOrFail($id)->delete();
        session()->flash('message', '❌ تکنسین حذف شد.');
    }

    public function render()
    {
        // صفحه‌بندی تکنسین‌ها
        $technicians = Technician::latest()->paginate(5);

        return view('livewire.admin.technician-manager', compact('technicians'));
    }
}
