<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Appointment;
class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'expertise',
        'is_available',
        'image',
    ];
    // اضافه کردن رابطه با Appointment
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
