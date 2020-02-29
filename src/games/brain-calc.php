<?php

use function BrainGames\core\gameInterface;

$instructions = "What is the result of the expression?";

$get_question_data = function () {

    $number1 = rand(0, 10);
    $number2 = rand(0, 10);
    $sign = array_rand(array_flip(['*', '+']));

    $question = $number1 . " {$sign} " . $number2;

    $calc_result = function ($number1, $number2, $sign) {
        return $sign === '*' ? $number1 * $number2 : $number1 + $number2;
    };

    $true_answer = $calc_result($number1, $number2, $sign);

    return [
        'question'     => $question,
        'true_answer'  => (string) $true_answer,
        'false_answer' => null,
    ];
};

gameInterface($instructions, $get_question_data);