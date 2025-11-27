<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'priority', 'user_id'];
    protected $casts = [
        'due_date' => 'date',
    ];

    public function user()
   {
    return $this->belongsTo(User::class);
   }
   public function project()
   {
       return $this->belongsTo(Project::class);
   }

   public function assignee()
   {
       return $this->belongsTo(User::class, 'assigned_to');
   }
}

