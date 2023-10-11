<?php

namespace do7akhaled\simpleFilter\Traits;

use do7akhaled\simpleFilter\Services\BaseFilterService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

trait Filterable
{
    public function scopeFilter(Builder $query, $parameters = [])
    {
        return app(BaseFilterService::class)->applyFilters($query, $this->filterMap ?? [], $parameters);
    }

    public function scopeLimitFilter(Builder $query, $parameters = [])
    {

        return $this->scopeFilter($query, $parameters)
            ->limit(min(abs(Arr::get($parameters, 'limit', 1000)), 1000));
    }
}
