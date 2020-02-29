<?php

use function BrainGames\Src\Core\gameInterface;

$instructions = "Find the greatest common divisor of given numbers";

$define_skipped_number = function (&$progressive, &$skipped_number) {
    $index = array_rand($progressive);

    $skipped_number = $progressive[$index];
    $progressive[$index] = '..';
};

$get_question_data = function () use ($define_skipped_number) {
    $start = rand(0, 100);
    $length = 10;

    $progressive = range($start, $start + $length);
    $skipped_number = null;

    $define_skipped_number($progressive, $skipped_number);

    $question = implode(' ', $progressive);
    $true_answer = $skipped_number;

    return [
        'question'     => $question,
        'true_answer'  => (string) $true_answer,
        'false_answer' => null,
    ];
};

gameInterface($instructions, $get_question_data);
