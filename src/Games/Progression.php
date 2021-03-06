<?php

namespace Brain\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function progression()
{
    $question = function ($num1, $num2): string {
        $list = createProgression($num1, $num2);
        $list = implode(' ', $list);
        return "Question: {$list}";
    };
    $calculation = function ($num1, $num2, $operator, $removableNumber = 3): int {
        $firstNumber = $num1;
        $progressionStep = $num2;
        $list = [];
        for ($i = 0, $element = $firstNumber; $i < 10; $i++) {
            $list[] = $element;
            $element += $progressionStep;
        }
        $rightAnswer = $list[$removableNumber];
        return $rightAnswer;
    };
    define("GAME_NAME", 'What number is missing in the progression?');
    return engineStart(GAME_NAME, $question, $calculation);
}

function createProgression(int $num1, int $num2, int $removableNumber = 3): array
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
