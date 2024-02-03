<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    private $genres = [];
    function index() {
        $this->genres = Genre::all();
        dd($this->genres);

        
    }
}
