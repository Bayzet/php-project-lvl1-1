<?php

namespace Brain\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function evenGame()
{
    $question = function ($num1, $num2): string {
        return "Question: $num1";
    };
    $calculation = function ($num1, $num2, $operator): string {
        return ($num1 % 2 === 0) ? "yes" : "no";
    };
    define("GAME_NAME", 'Answer "yes" if the number is even, otherwise answer "no".');
    return engineStart(GAME_NAME, $question, $calculation);
}
