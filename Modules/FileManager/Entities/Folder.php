<?php

namespace Modules\FileManager\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    const STATUS_ACTIVE = 1;

    const STATUS_INACTIVE = 0;

    const TYPE_STATIC = 'static';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'type',
        'user_id',
        'parent_id',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function child(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
