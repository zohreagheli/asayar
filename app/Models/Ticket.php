<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Ticket extends Model
{
    protected $fillable = [
        'title',        // تغییر از 'عنوان'
        'category',     // تغییر از 'گروه'
        'priority',     // تغییر از 'اولویت'
        'description',  // تغییر از 'توضیحات'
        'user_id',      // بدون تغییر
        'attachment_path',
    ];
    public function getAttachmentUrlAttribute()
    {
        if (!$this->attachment_path) {
            return null;
        }

        // اگر فایل تصویر است
        if (Str::endsWith($this->attachment_path, ['.jpg', '.jpeg', '.png', '.gif'])) {
            return asset('storage/' . $this->attachment_path);
        }
    }
    public function isImage()
{
    return $this->attachment_path && Str::endsWith($this->attachment_path, ['.jpg', '.jpeg', '.png', '.gif']);
}
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
