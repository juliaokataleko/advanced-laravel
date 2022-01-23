<?php

namespace App\QueryFilters;

use Closure;

class Active extends Filter {

    public function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }

}