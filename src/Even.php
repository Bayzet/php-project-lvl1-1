<?php

namespace Brain\Even;

use function cli\line;
use function cli\prompt;

function even($number, $userAnswer) // function to determine the parity
{
    if ($number % 2 === 0 && $userAnswer === 'yes') {
        return 'Correct!';
    } elseif ($number % 2 === 0 && $userAnswer === 'no') {
        return ''no' is wrong answer ;(. Correct answer was 'yes'';
    } elseif ($number % 2 !== 0 && $userAnswer === 'yes') {
        return ''yes' is wrong answer ;(. Correct answer was 'no'';
    } elseif ($number % 2 !== 0 && $userAnswer === 'no') {
        return 'Correct!';
    } elseif ($userAnswer !== 'no' && $userAnswer !== 'yes') {
        return 'Your answer is wrong';
    }
}

function evenGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $count = 0;
    while ($count < 3) {
        $number = rand();
        line("Question: $number");
        $userAnswer = prompt('Your answer: ');
        line("%s", even($number, $userAnswer));
        if (even($number, $userAnswer) === 'Correct!') {
            $count += 1;
        }
    }
    return "Congratulations, {$name}";
}