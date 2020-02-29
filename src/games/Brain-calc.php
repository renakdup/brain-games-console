<?php

namespace BrainGames\Src\Games\BrainCalc;

use function BrainGames\Src\Core\gameInterface;

function calculate($number1, $number2, $sign)
{
    if ($sign === '*') {
        $result = $number1 * $number2;
    } elseif ($sign === '+') {
        $result = $number1 + $number2;
    } elseif ($sign === '-') {
        $result = $number1 - $number2;
    } else {
        throw new Exception("Выполнение математической операции невозможно. Оператор {$sign} не найден");
    }

    return $result;
}

function getQuestionData()
{
    $number1 = rand(0, 10);
    $number2 = rand(0, 10);
    $sign = array_rand(array_flip(['*', '+', '-']));

    $question = "{$number1} {$sign} {$number2}";

    $trueAnswer = calculate($number1, $number2, $sign);

    return [
        'question'     => $question,
        'trueAnswer'  => (string) $trueAnswer,
    ];
}

function run()
{
    $instructions = "What is the result of the expression?";

    $getQuestionData = function () {
        return getQuestionData();
    };

    gameInterface($instructions, $getQuestionData);
}
