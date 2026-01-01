<?php

use App\Mcp\Servers\NhlstatsServer;
use Laravel\Mcp\Facades\Mcp;

 Mcp::web('/mcp/nhlstats', NhlstatsServer::class);
 Mcp::local('nhlstats', NhlstatsServer::class);
