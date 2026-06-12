<?php

namespace App\Enums;

enum AppointmentStatus: string
{
    case Pending = 'pending';
    case Assigned = 'assigned';
    case Accepted = 'accepted';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'در انتظار بررسی',
            self::Assigned => 'تخصیص داده شده',
            self::Accepted => 'تایید شده',
            self::InProgress => 'در حال انجام',
            self::Completed => 'انجام شده',
            self::Cancelled => 'لغو شده',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Assigned => 'info',
            self::Accepted => 'primary',
            self::InProgress => 'secondary',
            self::Completed => 'success',
            self::Cancelled => 'danger',
        };
    }
}
