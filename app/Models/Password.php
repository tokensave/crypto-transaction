<?php

namespace App\Models;

use App\Enums\Password\PasswordStatusEnum;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Password extends Model
{
    use HasFactory;
    use HasUuid;


    protected $fillable = [
        'uuid',
        'email',
        'user_id',
        'status',
        'ip'
    ];

    protected $casts =
        [
          'status' => PasswordStatusEnum::class
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function updateStatus(PasswordStatusEnum $status): bool
    {
        if ($this->status->is($status))
            return false;

        return $this->update(compact('status'));
    }
}
