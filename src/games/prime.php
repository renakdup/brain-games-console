<?php

namespace BrainGames\Src\Games\Prime;

use function BrainGames\Src\Core\gameInterface;

function getInstruction()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

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

function getQuestionData()
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
    $instructions = getInstruction();

    $getQuestionData = function () {
        return getQuestionData();
    };

    gameInterface($instructions, $getQuestionData);
}
