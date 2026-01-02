<?php

declare(strict_types=1);

namespace App\Mcp\Prompts;

use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Prompt;
use Laravel\Mcp\Server\Prompts\Argument;

class GetStandingsPrompt extends Prompt
{
    protected string $name = 'get-standings';
    protected string $title = 'Get Standings';
    protected string $description = <<<'MARKDOWN'
        Get the standings for the NHL.
    MARKDOWN;

    /**
     * Handle the prompt request.
     */
    public function handle(Request $request): Response
    {
        return Response::text('What are the standings of an NHL team, like the Colorado Avalanche?');
    }

    /**
     * Get the prompt's arguments.
     *
     * @return array<int, \Laravel\Mcp\Server\Prompts\Argument>
     */
    public function arguments(): array
    {
        return [
            new Argument('team', 'The team to get the standings for.'),
        ];
    }
}
