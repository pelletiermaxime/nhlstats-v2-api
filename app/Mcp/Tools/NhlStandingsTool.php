<?php

namespace App\Mcp\Tools;

use App\Models\Standings;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class NhlStandingsTool extends Tool
{
    private Standings $standings;

    protected string $name = 'nhl-standings';
    protected string $title = 'Nhl Standings Tool';
    protected string $description = 'Get the NHL standings for a given year.';

    public function __construct(
        Standings $standings
    ) {
        $this->standings = $standings;
    }

    /**
     * The input schema of the tool.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'year' => $schema->string()
                ->description('The year to fetch the standings for (e.g., 2023, 2024, etc.')
                ->required()
        ];
    }

    /**
     * Execute the tool call.
     */
    public function handle(): Response
    {
        $standings = $this->standings->byOverall()->toArray();

        return Response::json($standings);
    }
}
