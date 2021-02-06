<?php

namespace Brain\Gcd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function gcd()
{
    return engineStart("Gcd");
}

function question($num1, $num2)
{
    return "Question: {$num1} {$num2}";
}

function calculation($first, $second)
{
    while ($second != 0) {
        $temp = $first % $second;
        $first = $second;
        $second = $temp;
    }
    return $first;
}
