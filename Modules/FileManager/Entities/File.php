<?php

namespace Modules\FileManager\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $path
 * @property string $slug
 * @property string $ext
 * @property string $title
 * @property mixed $folder
 */
class File extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'ext',
        'file',
        'folder',
        'domain',
        'path',
        'size',
        'description',
        'user_id',
        'folder_id',
        'status',
        'type',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    public function getDist(): string
    {
        return $this->path.'/'.$this->file;
    }
}
