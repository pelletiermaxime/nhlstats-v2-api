<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Standings extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function byOverall()
    {
        $query = DB::table('standings')
            ->join('teams', 'teams.id', '=', 'standings.team_id')
            ->join('divisions', 'divisions.id', '=', 'teams.division_id')
            ->orderBy('PTS', 'DESC')
            ->orderBy('gp', 'ASC')
            ->orderBy('row', 'DESC')
            ->orderBy('w', 'DESC')
            ->where('standings.year', current_year());

        return $query->get();
    }
}
