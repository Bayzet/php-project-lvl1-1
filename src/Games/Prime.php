<?php

namespace Brain\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function easyNumber()
{
    return engineStart("Prime");
}

function question($num1, $num2)
{
    return "Question: {$num1}";
}

function calculation($num1, $num2)
{
    $countDeviders = 0;
    for ($i = 2, $length = $num1 / 2; $i <= $length; $i++) {
        if ($num1 % $i === 0) {
            $countDeviders += 1;
        }
    }
    if ($countDeviders === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}
