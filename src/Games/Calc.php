<?php

namespace Brain\Calc;

use function cli\line;
use function cli\prompt;

function calculation()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    if (amount($name) !== 'Correct!') {
        return print_r('You lost the game\\n');
    }
    if (subtraction($name) !== 'Correct!') {
        return print_r('You lost the game\\n');
    }
    if (multiple($name) !== 'Correct!') {
        return print_r('You lost the game\\n');
    }
    return print_r("Congratulations, {$name}!\n");
}

function amount($name)// Function is realizing summ numbers
{
    $count = 0;
    while ($count < 3) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $summa = $a + $b;
        line("Question: {$a} + {$b}");
        $userAnswer = (int) prompt('Your answer');
        if ($userAnswer === $summa) {
            return 'Correct!';
        } else {
            $count += 1;
            echo "{$userAnswer} is wrong answer ;(. Correct answer was {$summa}\nLet's try again, $name!\n";
        }
    }
    return 'You lost the game';
}

function subtraction($name)// Function is realizing subtraction numbers
{
    $count = 0;
    while ($count < 3) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $sub = $a - $b;
        line("Question: {$a} - {$b}");
        $userAnswer = (int) prompt('Your answer');
        if ($userAnswer === $sub) {
            return 'Correct!';
        } else {
            $count += 1;
            echo "{$userAnswer} is wrong answer ;(. Correct answer was {$sub}\nLet's try again, $name!\n";
        }
    }
    return 'You lost the game';
}

function multiple($name)// Function us realizing multiplication numbers
{
    $count = 0;
    while ($count < 3) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $mult = $a * $b;
        line("Question: {$a} * {$b}");
        $userAnswer = (int) prompt('Your answer');
        if ($userAnswer === $mult) {
            return 'Correct!';
        } else {
            $count += 1;
            echo "{$userAnswer} is wrong answer ;(. Correct answer was {$mult}\nLet's try again, $name!\n";
        }
    }
    return 'You lost the game';
}
