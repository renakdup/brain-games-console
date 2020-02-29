<?php

namespace BrainGames\src\games\Calc;

use function BrainGames\src\Core\gameInterface;

const INSTRUCTION = 'What is the result of the expression?';

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

function getQuestionAndTrueAnswer()
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
    $instructions = INSTRUCTION;

    $getQuestionData = function () {
        return getQuestionAndTrueAnswer();
    };

    gameInterface($instructions, $getQuestionData);
}
