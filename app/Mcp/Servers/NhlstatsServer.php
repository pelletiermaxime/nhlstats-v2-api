<?php

namespace App\Mcp\Servers;

use App\Mcp\Prompts\GetStandingsPrompt;
use App\Mcp\Tools\NhlStandingsTool;
use Laravel\Mcp\Server;

class NhlstatsServer extends Server
{
    public string $serverName = 'Nhlstats Server';

    public string $serverVersion = '0.0.1';

    public string $instructions = 'Example instructions for LLMs connecting to this MCP server.';

    public array $tools = [
         NhlStandingsTool::class,
    ];

    public array $resources = [
        // ExampleResource::class,
    ];

    public array $prompts = [
         GetStandingsPrompt::class,
    ];
}
