<?php

namespace BrainGames\Src\Games\BrainProgression;

use function BrainGames\Src\Core\gameInterface;

function defineSkippedNumber(&$progressive, &$skippedNumber)
{
    $index = array_rand($progressive);

    $skippedNumber = $progressive[$index];
    $progressive[$index] = '..';
}

function getQuestionData()
{
    $start = rand(0, 100);
    $length = 10;

    $progressive = range($start, $start + $length);
    $skippedNumber = null;

    defineSkippedNumber($progressive, $skippedNumber);

    $question = implode(' ', $progressive);
    $trueAnswer = $skippedNumber;

    return [
        'question'     => $question,
        'trueAnswer'  => (string) $trueAnswer,
    ];
}

function run()
{
    $instructions = "Find the greatest common divisor of given numbers";

    $getQuestionData = function () {
        return getQuestionData();
    };

    gameInterface($instructions, $getQuestionData);
}
