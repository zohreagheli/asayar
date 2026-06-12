<?php

namespace App\Models;
use App\Models\Service;
use App\Enums\AppointmentStatus;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $casts = [
    'status' => AppointmentStatus::class,
];
    protected $fillable = [

    'user_id',

    'service_id',

    'technician_id',

    'preferred_date',

    'preferred_time',

    'address',

    'description',

    'attachment',

    'status',
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function service()
{
    return $this->belongsTo(Service::class);
}

public function technician()
{
    return $this->belongsTo(Technician::class);
}

}
