<?php

namespace BrainGames\Src\Games\Calc;

use function BrainGames\Src\Core\gameInterface;

function getInstruction()
{
    return 'What is the result of the expression?';
}

function getSigns()
{
    return [
        '*',
        '+',
        '-'
    ];
}

function calculate($number1, $number2, $sign)
{
    switch ($sign) {
        case '*':
            $result = $number1 * $number2;
            break;
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        default:
            throw new \Exception("Executing mathematical operation impossible. Operator {$sign} not found");
    }

    return $result;
}

function getQuestionData()
{
    $number1 = rand(0, 10);
    $number2 = rand(0, 10);

    $getRandSign = function () {
        $sings = getSigns();
        return array_rand(array_flip($sings));
    };

    $sign = $getRandSign();

    $question = "{$number1} {$sign} {$number2}";

    $trueAnswer = calculate($number1, $number2, $sign);

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
