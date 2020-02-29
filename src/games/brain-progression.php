<?php

use function BrainGames\core\gameInterface;

$instructions = "Find the greatest common divisor of given numbers";

$get_question_data = function () {

    $start = rand(0, 100);
    $length = 10;

    $progressive = range($start, $start + $length);
    $skipped_number = null;

    $define_skipped_number = function () use (&$progressive, &$skipped_number) {
        $index = array_rand($progressive);

        $skipped_number = $progressive[$index];
        $progressive[$index] = '..';
    };

    $define_skipped_number();

    $question = implode(' ', $progressive);
    $true_answer = $skipped_number;

    return [
        'question'     => $question,
        'true_answer'  => (string) $true_answer,
        'false_answer' => null,
    ];
};

gameInterface($instructions, $get_question_data);
