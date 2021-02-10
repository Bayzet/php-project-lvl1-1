<?php

namespace Brain\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\engineStart;

function calc()
{
    $questionVariable = function ($num1, $num2) {
        $random = rand(0, 2);
        switch ($random) {
            case 0:// amount
                return "Question: {$num1} + {$num2}";
            case 1:// subtractio
                return "Question: {$num1} - {$num2}";
            case 2:// multiple
                return "Question: {$num1} * {$num2}";
        }
    };
    $calculation = function ($numb1, $numb2, $operator) {
        switch ($operator) {
            case "+":// amount
                return $numb1 + $numb2;
            case "-":// subtractio
                return $numb1 - $numb2;
            case "*":// multiple
                return $numb1 * $numb2;
        }
    };
    $operator = function ($questionVariable, $num1, $num2) {
        switch ($questionVariable) {
            case "Question: {$num1} + {$num2}":// Calc.php
                return "+";
            case "Question: {$num1} - {$num2}":// Even.php
                return "-";
            case "Question: {$num1} * {$num2}":// Gcd.php
                return "*";
        }
    };
    define("GAME_NAME", 'What is the result of the expression?');
    return engineStart(GAME_NAME, $questionVariable, $calculation, $operator);
}
