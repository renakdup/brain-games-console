<?php

namespace BrainGames\Src\Core;

use function cli\line;
use function cli\prompt;

function questionsRepeater($name, $getQuestionData, $questionsRepeatNumber)
{
    for ($i = 0; $i < $questionsRepeatNumber; $i++) {
        $questionData = $getQuestionData();

        $question = $questionData['question'];
        $trueAnswer = $questionData['trueAnswer'];

        $answer = prompt('Question: ' . $question);

        line('Your answer: ' . $answer);

        if ($answer !== $trueAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$trueAnswer}'.");
            line('Let\'s try again, ' . $name . '!');
            return;
        }

        line('Correct!');
    }

    line('Congratulations, ' . $name . '!');
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

    $questionsRepeatNumber = 3;

    questionsRepeater($instructions, $getQuestionData, $questionsRepeatNumber);
}
