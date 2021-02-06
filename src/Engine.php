<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function engineStart($gameName, $gameCount = 3)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line(defineTheGame($gameName));
    for ($i = 1; $i <= $gameCount; $i++) {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);
        $questionVariable = question($gameName, $num1, $num2);
        line($questionVariable);
        $operator = null;
        if ($gameName === "Calc") {
            $operator = operator($questionVariable, $num1, $num2);
        }
        $rightAnswer = calculation($gameName, $num1, $num2, $operator);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $rightAnswer) {
            line("Correct!\n");
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$rightAnswer}\nLet's try again, $name!\n");
            return line("You lost the game, $name!\n");
        }
    }
    return line("Congratulations, $name!\n");
}

function defineTheGame($gameName)
{
    switch ($gameName) {
        case "Calc":// Calc.php
            return 'What is the result of the expression?';
        case "Even":// Even.php
            return 'Answer "yes" if the number is even, otherwise answer "no".';
        case "Gcd":// Gcd.php
            return 'Find the greatest common divisor of given numbers.';
        case "Prime":// Prime.php
            return 'Answer "yes" if given number is prime. Otherwise answer "no"';
        case "Progression":// Progression.php
            return 'What number is missing in the progression?';
    }
}

function calculation($gameName, $num1, $num2, $operator = null)
{
    switch ($gameName) {
        case "Calc":// Calc.php
            return \Brain\Calc\calculation($num1, $num2, $operator);
        case "Even":// Even.php
            return \Brain\Even\calculation($num1, $num2);
        case "Gcd":// Gcd.php
            return \Brain\Gcd\calculation($num1, $num2);
        case "Prime":// Prime.php
            return \Brain\Prime\calculation($num1, $num2);
        case "Progression":// Progression.php
            return \Brain\Progression\calculation($num1, $num2);
    }
}

function question($gameName, $num1, $num2)
{
    switch ($gameName) {
        case "Calc":// Calc.php
            return \Brain\Calc\question($num1, $num2);
        case "Even":// Even.php
            return \Brain\Even\question($num1, $num2);
        case "Gcd":// Gcd.php
            return \Brain\Gcd\question($num1, $num2);
        case "Prime":// Prime.php
            return \Brain\Prime\question($num1, $num2);
        case "Progression":// Progression.php
            return \Brain\Progression\question($num1, $num2);
    }
}

function operator($questionVariable, $num1, $num2)
{
    switch ($questionVariable) {
        case "Question: {$num1} + {$num2}":// Calc.php
            return "+";
        case "Question: {$num1} - {$num2}":// Even.php
            return "-";
        case "Question: {$num1} * {$num2}":// Gcd.php
            return "*";
    }
}
