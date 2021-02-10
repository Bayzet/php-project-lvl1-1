<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

define("GAME_COUNT", 3);

function engineStart(string $game, callable $questionVariable, callable $calculation, callable $operator = null): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($game);
    for ($i = 1; $i <= GAME_COUNT; $i++) {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);
        $question = $questionVariable($num1, $num2);
        line($question);
        $operatorCalc = ($operator) ? $operator($question, $num1, $num2) : null;
        $rightAnswer = $calculation($num1, $num2, $operatorCalc);
        $userAnswer = prompt('Your answer', '');
        if ($userAnswer === '') {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$rightAnswer}\nLet's try again, $name!\n");
            return line("You lost the game, {$name}!\n");
        }
        if ($userAnswer == $rightAnswer) {
            line("Correct!\n");
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$rightAnswer}\nLet's try again, $name!\n");
            return line("You lost the game, {$name}!\n");
        }
    }
    return line("Congratulations, {$name}!\n");
}
