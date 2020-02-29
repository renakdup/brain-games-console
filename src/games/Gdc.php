<?php

namespace BrainGames\src\games\Gdc;

use function BrainGames\src\Core\gameInterface;

const INSTRUCTION = 'Find the greatest common divisor of given numbers';

function getGdc($number1, $number2)
{
    while ($number1 !== 0 && $number2 !== 0) {
        if ($number1 > $number2) {
            $number1 = $number1 % $number2;
        } else {
            $number2 = $number2 % $number1;
        }
    }

    return $number1 + $number2;
}

function getQuestionAndTrueAnswer()
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);

    $question = $number1 . " " . $number2;

    $trueAnswer = getGdc($number1, $number2);

    return [
        'question'    => $question,
        'trueAnswer'  => (string) $trueAnswer,
    ];
}

function run()
{
    $getData = function () {
        return getQuestionAndTrueAnswer();
    };

    gameInterface(INSTRUCTION, $getData);
}
