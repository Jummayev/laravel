<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ResourceTrait
{
    /**
     * Transform the resource into an array.
     */
    protected function getRelations(Request $request, array $data): array
    {
        $appends = explode(',', $request->get('append'));
        if ($request->filled('append')) {
            foreach ($appends as $append) {
                $data["$append"] = $this->$append;
            }
        }

        return $data;
    }
}
