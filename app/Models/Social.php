<?php

namespace App\Models;

use App\Enums\Social\SocialDriverEnum;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'user_id',
        'driver',
        'driver_user_id'
    ];

    protected $casts = [
        'driver' => SocialDriverEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
