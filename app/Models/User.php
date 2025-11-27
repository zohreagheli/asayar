<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task;
use App\Models\Appointment;
use App\Notifications\ResetPasswordNotification;
class User extends Authenticatable
{
use  Notifiable;
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tasks():HasMany
   {
    return $this->hasMany(Task::class);
   }
   // در مدل User
public function getAvatarUrlAttribute()
{
    return $this->avatar ? asset('storage/avatars/'.$this->avatar) : asset('assets/panel/images/users/21.jpg');
}
/**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}

}
