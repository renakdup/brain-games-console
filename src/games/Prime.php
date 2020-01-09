<?php

namespace BrainGames\src\games\Prime;

use function BrainGames\src\Core\gameInterface;

const INSTRUCTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrimeNumber($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function getQuestionAndTrueAnswer()
{
    $question = rand(0, 20);

    $trueAnswer = isPrimeNumber($question) ? 'yes' : 'no';

    return [
        'question' => $question,
        'trueAnswer' => $trueAnswer,
    ];
}

function run()
{
    $instructions = INSTRUCTION;

    $getQuestionData = function () {
        return getQuestionAndTrueAnswer();
    };

    gameInterface($instructions, $getQuestionData);
}
