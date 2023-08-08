<?php

namespace Modules\FileManager\Http\Repository\Interfaces;

use Illuminate\Http\JsonResponse;
use Modules\FileManager\Dto\GeneratedPathFileDTO;
use Modules\Filemanager\Dto\GeneratePathFileDTO;
use Modules\FileManager\Entities\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface FileInterface
{
    public function generatePath(GeneratePathFileDTO $generatePathFileDTO): GeneratedPathFileDTO;

    public function uploadFile(GeneratePathFileDTO $dto): JsonResponse;

    public function downloadFile(File $file, $type): BinaryFileResponse;
}
