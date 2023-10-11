<?php

namespace do7akhaled\simpleFilter\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface ApplyFilter
{
    public function apply(Builder $query, string $key, $value, $context = []): Builder;
}
