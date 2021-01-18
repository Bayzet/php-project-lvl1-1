<?php

namespace Brain\Progression;

use function cli\line;
use function cli\prompt;

function progression()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');
    if (progress($name)) {
        return print_r("Congratulations, $name!\n");
    } else {
        return print_r("You lost the game, $name!\n");
    }
}

function progress($name)
{
    $count = 0;
    $countWrong = 0;
    while ($count < 3 && $countWrong < 3) {
        $a = rand(0, 100);
        $k = rand(0, 10);
        $j = rand(0, 8);
        $list = [];
        for ($i = 0, $element = $a; $i < 10; $i++) {
            $list[] = $element;
            $element += $k;
        }
        $rightAnswer = $list[$j];
        $list[$j] = '..';
        $list = implode(' ', $list);
        line("Question: {$list}");
        $userAnswer = (int) prompt('Your answer');
        if ($userAnswer === $rightAnswer) {
            $count += 1;
            echo "Correct!\n";
        } else {
            $countWrong += 1;
            echo "{$userAnswer} is wrong answer ;(. Correct answer was {$rightAnswer}\nLet's try again, $name!\n";
        }
    }
    if ($count === 3) {
        return true;
    } else {
        return false;
    }
}
