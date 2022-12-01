<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;

class SeasonsController extends Controller
{
    public function index(Series $series) 
    {
        $seasons = $series->seasons; //recebe uma collection

        return view('seasons.index')->with('seasons', $seasons)->with('series', $series);
    }
}
