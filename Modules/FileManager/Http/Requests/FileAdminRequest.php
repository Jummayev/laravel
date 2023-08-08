<?php

namespace Modules\FileManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:jpg,png,jpeg,gif,svg,pdf,docx,doc,xlsx,xls,ppt,pptx,zip|max:2048',
            'title' => 'nullable|string|max:255',
            'folder_id' => 'nullable|integer|exists:folders,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
