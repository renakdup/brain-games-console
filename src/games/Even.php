<?php

namespace BrainGames\src\games\Even;

use function BrainGames\src\Core\gameInterface;

const INSTRUCTION = 'Answer "yes" if the number is even, otherwise answer "no"';

function isEven($number)
{
    return $number % 2 === 0;
}

function getQuestionAndTrueAnswer()
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
    $instructions = INSTRUCTION;

    $getQuestionData = function () {
        return getQuestionAndTrueAnswer();
    };

    gameInterface($instructions, $getQuestionData);
}
