<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;

trait DefaultQuery
{
    /**
     * @param  Request  $request
     */
    public function createData($request): mixed
    {
        /**
         * @param  Model  $model
         */
        $model = $this->modelClass::create($request->validated());
        $model->load($request->filled('include') ? explode(',', $request->get('include')) : []);
        $model->append($request->filled('append') ? explode(',', $request->get('include')) : []);

        return $model;
    }

    public function updateData($request, $model): mixed
    {
        $model->update($request->validated());
        $model->load($request->filled('include') ? explode(',', $request->get('include')) : []);
        $model->append($request->filled('append') ? explode(',', $request->get('include')) : []);

        return $model;
    }

    public function deleteData($model): mixed
    {
        $model->delete();

        return $model;
    }

    public function defaultQuery(Request $request, &$query): void
    {
        $filters = $request->get('filter', []);
        $search = $request->get('search', []);
        $filter = [];
        foreach ($filters as $k => $item) {
            $filter[] = AllowedFilter::exact($k);
        }
        foreach ($search as $k => $item) {
            $filter[] = $k;
        }
        $query->allowedFilters($filter);
        $query->allowedIncludes($request->filled('include') ? explode(',', $request->get('include')) : []);
        $query->allowedSorts($request->get('sort'));
    }
}
