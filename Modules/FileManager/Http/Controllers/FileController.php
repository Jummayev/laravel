<?php

declare(strict_types=1);

namespace Modules\FileManager\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Modules\Filemanager\Dto\GeneratePathFileDTO;
use Modules\FileManager\Entities\File;
use Modules\FileManager\Http\Repository\Interfaces\FileInterface;
use Modules\FileManager\Http\Requests\FileAdminRequest;
use Modules\FileManager\Http\Requests\FileClientRequest;
use Spatie\QueryBuilder\QueryBuilder;

class FileController extends Controller
{
    public function __construct(protected File $modelClass, protected FileInterface $fileRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function clientIndex(Request $request)
    {
        $query = QueryBuilder::for(File::class);
        $this->defaultQuery($request, $query);
        $data = $query->simplePaginate($request->get('per_page'));

        return ResponseResource::collection($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function adminIndex(Request $request)
    {
        $query = QueryBuilder::for(File::class);
        $this->defaultQuery($request, $query);
        $data = $query->paginate($request->get('per_page'));

        return ResponseResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function adminStore(FileAdminRequest $request)
    {
        $request->validated();
        $dto = new GeneratePathFileDTO();
        $dto->file = $request->file('file');
        $dto->folder_id = $request->get('folder_id');

        return $this->fileRepository->uploadFile($dto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function clientStore(FileClientRequest $request)
    {
        $dto = new GeneratePathFileDTO();
        $dto->file = $request->file('file');
        $dto->folder_id = $request->get('folder_id');

        return $this->fileRepository->uploadFile($dto);
    }

    /**
     * Show the specified resource.
     *
     * @return JsonResponse
     */
    public function show(File $file)
    {
        return okResponse($file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(Request $request, File $file)
    {
        $file->update($request->all());
        return okResponse(message: 'File updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy(File $file)
    {
        $file->delete();
        Storage::delete("");
        return okResponse(message: 'File deleted');
    }
}
