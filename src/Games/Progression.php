<?php

namespace Brain\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function progression()
{
    return engineStart("Progression");
}

function question($num1, $num2)
{
    $list = createProgression($num1, $num2);
    $list = implode(' ', $list);
    return "Question: {$list}";
}

function createProgression($num1, $num2, $removableNumber = 3)
{
    $firstNumber = $num1;
    $progressionStep = $num2;
    $list = [];
    for ($i = 0, $element = $firstNumber; $i < 10; $i++) {
        $list[] = $element;
        $element += $progressionStep;
    }
    $list[$removableNumber] = '..';
    return $list;
}

function calculation($num1, $num2, $removableNumber = 3)
{
    $firstNumber = $num1;
    $progressionStep = $num2;
    $list = [];
    for ($i = 0, $element = $firstNumber; $i < 10; $i++) {
        $list[] = $element;
        $element += $progressionStep;
    }
    $rightAnswer = $list[$removableNumber];
    return $rightAnswer;
}
