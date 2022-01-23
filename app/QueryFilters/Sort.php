<?php

namespace App\QueryFilters;

use Closure;

class Sort extends Filter
{

    public function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method
        return $builder->orderBy('title', request($this->filterName()));
    }
}
