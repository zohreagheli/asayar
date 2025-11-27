<?php

namespace App\Models;
use App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $casts = [
        'start_time' => 'datetime:Y-m-d H:i',
        'end_time' => 'datetime:Y-m-d H:i'
    ];
    protected $fillable = [
   'user_id',
    'service_id',
    'technician_id',
    'date',  
    'address',
    'time',
    'start_time',
    'end_time',
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
