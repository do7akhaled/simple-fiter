<?php

namespace do7akhaled\simpleFilter\Services;

use do7akhaled\simpleFilter\Interfaces\ApplyFilter;
use Illuminate\Database\Eloquent\Builder;

class BaseFilterService
{
    public function applyFilters(Builder $query, $filterMap = [], $parameters = []) : Builder
    {
        foreach ($this->getFilterable($filterMap, $parameters) as $key => $filterClass) {
            $filter = app($filterClass);

            if ($filter instanceof ApplyFilter)
                $query = $filter->apply($query, $key, $parameters[$key], $parameters);
        }

        return $query;
    }

    private function getFilterable($filterMap = [], $parameters = [])
    {
        return array_intersect_key($filterMap, $parameters);
    }
}
