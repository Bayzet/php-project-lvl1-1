<?php

namespace Brain\Prime;

use function cli\line;
use function cli\prompt;

function easyNumber()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no"');
    if (primeNumber($name)) {
        return print_r("Congratulations, $name!\n");
    } else {
        return print_r("You lost the game, $name!\n");
    }
}

function primeNumber($name)
{
    $count = 0;
    $countWrong = 0;
    while ($count < 3 && $countWrong < 3) {
        $a = rand(0, 100);
        $countDeviders = 0;
        for ($i = 2, $length = $a / 2; $i <= $length; $i++) {
            if ($a % $i === 0) {
                $countDeviders += 1;
            }
        }
        if ($countDeviders === 0) {
            $rightAnswer = 'yes';
        } else {
            $rightAnswer = 'no';
        }
        line("Question: {$a}");
        $userAnswer = prompt('Your answer');
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
