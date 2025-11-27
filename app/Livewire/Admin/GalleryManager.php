<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryImage;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.admin')]
class GalleryManager extends Component
{
    use WithFileUploads;

    public $images = [];
    public $titles = []; // عنوان هر تصویر

    public $editId = null; // برای ویرایش بعدی

    public function save()
    {
        $this->validate([
            'images.*' => 'image|max:2048',
            'titles.*' => 'nullable|string|max:255',
        ]);

        foreach ($this->images as $index => $image) {
            $path = $image->store('gallery', 'public');

            GalleryImage::create([
                'image' => $path,
                'title' => $this->titles[$index] ?? null,
            ]);
        }

        $this->reset(['images', 'titles']);
        session()->flash('success', 'تصاویر با موفقیت اضافه شدند.');
    }

    public function edit($id)
    {
        $this->editId = $id;
        $this->titles[$id] = GalleryImage::find($id)->title;
    }

    public function update($id)
    {
        $this->validate([
            "titles.$id" => 'nullable|string|max:255',
        ]);

        $image = GalleryImage::findOrFail($id);
        $image->update(['title' => $this->titles[$id]]);
        $this->editId = null;

        session()->flash('success', 'عنوان تصویر ویرایش شد.');
    }

    public function delete($id)
    {
        $image = GalleryImage::findOrFail($id);
        Storage::disk('public')->delete($image->image);
        $image->delete();

        session()->flash('success', 'تصویر حذف شد.');
    }

    public function render()
    {
        $gallery = GalleryImage::latest()->get();
        return view('livewire.admin.gallery-manager', compact('gallery'));
    }
}
