<?php

namespace BrainGames\Src\Games\Even;

use function BrainGames\Src\Core\gameInterface;

function getInstruction()
{
    return 'Answer "yes" if the number is even, otherwise answer "no"';
}

function isEven($number)
{
    return $number % 2 === 0;
}

function getQuestionData()
{
    $question = rand(0, 100);

    $trueAnswer = isEven($question) ? 'yes' : 'no';

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
