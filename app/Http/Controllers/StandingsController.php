<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Standings;
use Illuminate\Support\Collection;

class StandingsController extends Controller
{
    public function index(Standings $standings): Collection
    {
        return $standings->byOverall();
    }
}
