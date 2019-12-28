<?php

use function BrainGames\Src\Core\gameInterface;

$instructions = "Find the greatest common divisor of given numbers";

$get_gdc = function ($number1, $number2) {
    while ($number1 !== 0 && $number2 !== 0) {
        if ($number1 > $number2) {
            $number1 = $number1 % $number2;
        } else {
            $number2 = $number2 % $number1;
        }
    }

    return $number1 + $number2;
};

$get_question_data = function () use ($get_gdc) {
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);

    $question = $number1 . " " . $number2;

    $true_answer = $get_gdc($number1, $number2);

    return [
        'question'     => $question,
        'true_answer'  => (string) $true_answer,
        'false_answer' => null,
    ];
};

gameInterface($instructions, $get_question_data);
