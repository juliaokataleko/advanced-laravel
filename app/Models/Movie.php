<?php

namespace App\Models;

use App\QueryFilters\Active;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;


class Movie extends Model
{
    use HasFactory;

    public static function allMovies()
    {
        return
        app(Pipeline::class)
        ->send(Movie::query())
        ->through([
            Active::class,
            Sort::class,
            MaxCount::class
        ])
        ->thenReturn()
        ->paginate(5);
    }
}
