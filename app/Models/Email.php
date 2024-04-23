<?php

namespace App\Models;

use App\Enums\Email\EmailStatusEnum;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable =
        [
            'uuid',
            'value',
            'user_id',
            'status',
            'code'
        ];

    protected $casts =
        [
            'status' => EmailStatusEnum::class
        ];

    public static function booted(): void
    {
       self::creating(function (Email $email) {
           $email->code = code();
       });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updateStatus(EmailStatusEnum $status): bool
    {
        if ($this->status->is($status))
            return false;

        return $this->update(compact('status'));
    }
}
