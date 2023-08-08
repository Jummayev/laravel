<?php

namespace Modules\FileManager\Dto;

use Illuminate\Http\UploadedFile;

class GeneratePathFileDTO
{
    public UploadedFile $file;

    public int $folder_id;

    public bool $useFileName = false;
}
