<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

class TeamsController extends Controller
{
    public function index(): Collection
    {
        return Team::all();
    }
}
