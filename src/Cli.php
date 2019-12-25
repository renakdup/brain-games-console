<?php

namespace BrainGames\Cli;

use function cli\line;

function run($game)
{
    switch ($game) {
        case 'brain-even':
            require 'inc/brain-even.php';
            break;
        case 'brain-games':
            require 'inc/brain-games.php';
            break;
        default:
            line('Game not found');
    }
}
