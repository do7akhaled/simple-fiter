<?php

namespace do7akhaled\simpleFilter\Filters;


use do7akhaled\simpleFilter\Interfaces\ApplyFilter;
use Illuminate\Database\Eloquent\Builder;

class OffsetFilter implements ApplyFilter
{

    public function apply(Builder $query, string $key, $value, $context = []): Builder
    {

        return $query->offset($value);
    }
}
