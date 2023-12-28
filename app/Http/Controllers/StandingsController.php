<?php

namespace App\Http\Controllers;

use App\Models\Standings;
use Illuminate\Database\Eloquent\Collection;

class StandingsController extends Controller
{
    public function index(): Collection
    {
        return Standings::all();
    }
}
