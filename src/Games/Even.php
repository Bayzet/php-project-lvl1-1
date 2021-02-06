<?php

namespace Brain\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function calculation($num1, $num2)
{
    return ($num1 % 2 === 0) ? "yes" : "no";
}

function question($num1, $num2)
{
    return "Question: $num1";
}

function evenGame()
{
    return engineStart("Even");
}
