<?php

namespace App\Console\Commands;

use App\Models\Standings;
use App\Models\Team;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStandings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-standings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the nhl standing info from nhl.com';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $teams = $this->getTeamsArray();
        $this->saveStandings($teams);
    }

    private function getTeamsArray()
    {
        $url = 'https://api-web.nhle.com/v1/standings/2023-12-27';
        $response = Http::get($url);

        $standings = $response->json('standings');
        $formattedStandings = [];

        foreach ($standings as $standing) {
            $formattedStandings[] = [
                'Team'   => $standing['teamCommonName']['default'],
                'GP'     => $standing['gamesPlayed'],
                'W'      => $standing['wins'],
                'L'      => $standing['losses'],
                'ROW'    => $standing['regulationPlusOtWins'],
                'OTL'    => $standing['otLosses'],
                'PTS'    => $standing['points'],
                'GF'     => $standing['goalFor'],
                'GA'     => $standing['goalAgainst'],
                'Diff'   => $standing['goalDifferential'],
                'HOME'   => $standing['homeWins'] . '-' . $standing['homeLosses'] . '-' . $standing['homeOtLosses'],
                'ROAD'   => $standing['roadWins'] . '-' . $standing['roadLosses'] . '-' . $standing['roadOtLosses'],
                'L10'    => $standing['l10Wins'] . '-' . $standing['l10Losses'] . '-' . $standing['l10OtLosses'],
                'Streak' => $standing['streakCode'] . $standing['streakCount'],
            ];
        }

        return $formattedStandings;
    }

    private function saveStandings(array $teams)
    {
        Standings::where('year', current_year())->delete();
        foreach ($teams as $team) {
            $teamID = Team::whereName($team['Team'])->pluck('id')->last();

            Standings::create([
                'team_id' => $teamID,
                'year'    => current_year(),
                'gp'      => $team['GP'],
                'w'       => $team['W'],
                'l'       => $team['L'],
                'otl'     => $team['OTL'],
                'pts'     => $team['PTS'],
                'row'     => $team['ROW'],
                'gf'      => $team['GF'],
                'ga'      => $team['GA'],
                'diff'    => $team['Diff'],
                'home'    => $team['HOME'],
                'away'    => $team['ROAD'],
                'l10'     => $team['L10'],
                'streak'  => $team['Streak'],
            ]);
        }
    }
}
