<?php

namespace BrainGames\Src\Games\Gdc;

use function BrainGames\Src\Core\gameInterface;

function getInstruction()
{
    return 'Find the greatest common divisor of given numbers';
}

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

function getQuestionData()
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);

    $question = $number1 . " " . $number2;

    $trueAnswer = getGdc($number1, $number2);

    return [
        'question'     => $question,
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
