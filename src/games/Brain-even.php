<?php

namespace BrainGames\Src\Games\BrainEven;

use function BrainGames\Src\Core\gameInterface;

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
    $instructions = 'Answer "yes" if the number is even, otherwise answer "no"';

    $getQuestionData = function () {
        return getQuestionData();
    };

    gameInterface($instructions, $getQuestionData);
}
