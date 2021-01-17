<?php

namespace Brain\Gcd;

use function cli\line;
use function cli\prompt;

function gcd()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');
    if (divider($name)) {
        return print_r("Congratulations, $name!\n");
    } else {
        return print_r("You lost the game, $name!\n");
    }
}

function divider($name)
{
    $count = 0;
    $countWrong = 0;
    while ($count < 3 && $countWrong < 3) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $rightAnswer = (int) gmp_gcd($a, $b);
        line("Question: {$a} {$b}");
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
