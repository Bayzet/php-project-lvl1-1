<?php

namespace Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function gcd()
{
    $question = function ($num1, $num2) {
        return "Question: {$num1} {$num2}";
    };
    $calculation = function ($first, $second, $operator) {
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
