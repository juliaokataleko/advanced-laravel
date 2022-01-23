<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\QueryFilters\Active;
use App\QueryFilters\Sort;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;


class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::allMovies();
        return view('movie.index', compact('movies'));
    }
}
