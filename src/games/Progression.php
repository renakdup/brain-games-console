<?php

namespace BrainGames\src\games\Progression;

use function BrainGames\src\Core\gameInterface;

const INSTRUCTION = 'What number is missing in the progression?';

function getQuestionAndTrueAnswer()
{
    $numberProgression = 10;
    $progressionStep = rand(1, 10);
    $start = rand(0, 100);
    $end = $start + $numberProgression * $progressionStep;

    $entireProgressive = range($start, $end, $progressionStep);

    $missingNumberIndex = array_rand($entireProgressive);
    $missingNumber = $entireProgressive[$missingNumberIndex];

    $getProgressionWithMissNumber = function ($progressive, $missingNumberIndex) {
        $progressive[$missingNumberIndex] = '..';
        return $progressive;
    };

    $progressive = $getProgressionWithMissNumber($entireProgressive, $missingNumberIndex);

    $question = implode(' ', $progressive);
    $trueAnswer = $missingNumber;

    return [
        'question'    => $question,
        'trueAnswer'  => (string) $trueAnswer,
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
