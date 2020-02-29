<?php

namespace BrainGames\Src\Games\Progression;

use function BrainGames\Src\Core\gameInterface;

function getInstruction()
{
    return 'Find the greatest common divisor of given numbers';
}

function defineSkippedNumber(&$progressive, &$skippedNumber)
{
    $index = array_rand($progressive);

    $skippedNumber = $progressive[$index];
    $progressive[$index] = '..';
}

function getQuestionData()
{
    $skippedNumber = null;

    $numberProgression = 10;
    $progressionStep = 1;
    $start = rand(0, 100);
    $end = $start + $numberProgression * $progressionStep;

    $progressive = range($start, $end, $progressionStep);

    defineSkippedNumber($progressive, $skippedNumber);

    $question = implode(' ', $progressive);
    $trueAnswer = $skippedNumber;

    return [
        'question'    => $question,
        'trueAnswer'  => (string) $trueAnswer,
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
