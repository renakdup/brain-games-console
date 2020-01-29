<?php

namespace BrainGames\src\Core;

use function cli\line;
use function cli\prompt;

const QUESTIONS_COUNT = 3;

function playRound($name, $getData, $questionsCount)
{
    for ($i = 0; $i < $questionsCount; $i++) {
        $data = $getData();

        $question = $data['question'];
        $trueAnswer = $data['trueAnswer'];

        $answer = prompt("Question: {$question}");

        line("Your answer: {$answer}");

        if ($answer !== $trueAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$trueAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, {$name}!");
}

/**
 * @param string   $instructions
 * @param callable $getData  При вызове должен возвращать массив со следущими элементами
 *                           array( 'question' => string, 'trueAnswer' => string )
 */
function gameInterface(string $instructions, callable $getData)
{
    line('Welcome to the Brain Game!');
    line($instructions);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    playRound($instructions, $getData, QUESTIONS_COUNT);
}
