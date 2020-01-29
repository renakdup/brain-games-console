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
    $trueAnswer = $entireProgressive[$missingNumberIndex];

    $getQuestion = function ($progressive, $missingNumberIndex) {
        $progressive[$missingNumberIndex] = '..';
        return $progressive;
    };

    $progressive = $getQuestion($entireProgressive, $missingNumberIndex);

    $question = implode(' ', $progressive);

    return [
        'question'    => $question,
        'trueAnswer'  => (string) $trueAnswer,
    ];
}

function run()
{
    $instructions = INSTRUCTION;

    $getData = function () {
        return getQuestionAndTrueAnswer();
    };

    gameInterface($instructions, $getData);
}
