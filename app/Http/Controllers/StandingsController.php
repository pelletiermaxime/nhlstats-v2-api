<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StandingsController extends Controller
{
    public function index()
    {
        return [
            [
                'city' => 'Tampa Bay',
                'name' => 'Lightning',
                'short_name' => 'TBL',
                'division' => 'Atlantic',
                'conference' => 'Eastern',
                'gp' => 70,
                'w' => 43,
                'l' => 21,
                'otl' => 6,
                'pts' => 92,
                'row' => 35,
                'gf' => 236,
                'ga' => 195,
                'diff' => 41,
                'home' => '23-9-2',
                'away' => '20-12-4',
                'l10' => '6-3-1',
                'streak' => 'W1',
            ],
            [
                'city' => 'Boston',
                'name' => 'Bruins',
                'short_name' => 'BOS',
                'division' => 'Atlantic',
                'conference' => 'Eastern',
                'gp' => 70,
                'w' => 44,
                'l' => 14,
                'otl' => 12,
                'pts' => 100,
                'row' => 35,
                'gf' => 236,
                'ga' => 195,
                'diff' => 41,
                'home' => '22-4-9',
                'away' => '22-20-3',
                'l10' => '6-3-1',
                'streak' => 'W2',
            ],
        ];
    }
}
