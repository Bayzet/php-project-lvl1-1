<?php

namespace Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function gcd(): callable
{
    $question = function ($num1, $num2): string {
        return "Question: {$num1} {$num2}";
    };
    $calculation = function ($first, $second, $operator): int {
        while ($second != 0) {
            $temp = $first % $second;
            $first = $second;
            $second = $temp;
        }
        return $first;
    };
    define("GAME_NAME", 'Find the greatest common divisor of given numbers.');
    return engineStart(GAME_NAME, $question, $calculation);
}
