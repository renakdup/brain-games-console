<?php

namespace BrainGames\src\Core;

use function cli\line;
use function cli\prompt;

function askQuestions($name, $getQuestionData, $numberQuestions)
{
    for ($i = 0; $i < $numberQuestions; $i++) {
        $questionData = $getQuestionData();

        $question = $questionData['question'];
        $trueAnswer = $questionData['trueAnswer'];

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
 * @param callable $getQuestionData  При вызове должен возвращать массив со следущими элементами
 *                                        array( 'question' => string,
 *                                               'trueAnswer' => string )
 */
function gameInterface(string $instructions, callable $getQuestionData)
{
    line('Welcome to the Brain Game!');
    line($instructions);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $numberQuestions = 3;

    askQuestions($instructions, $getQuestionData, $numberQuestions);
}
