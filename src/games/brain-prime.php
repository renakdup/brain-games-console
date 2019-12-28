<?php

use function BrainGames\Src\Core\gameInterface;

$instructions = 'Answer "yes" if given number is prime. Otherwise answer "no".';

// Реализация взята из https://github.com/sabirsaid/isPrime
$is_prime_number = function ($number) {
    if ($number < 0) {
        $number = -$number;
    }

    return ($number > 1) && (($number % 2 >= 1) && ($number % 3 >= 1) && ($number % 5 >= 1))
           || in_array($number, [2, 3, 5]);
};

$get_question_data = function () use ($is_prime_number) {
    $question = rand(0, 20);

    if ($is_prime_number($question)) {
        $true_answer = 'yes';
        $false_answer = 'no';
    } else {
        $true_answer = 'no';
        $false_answer = 'yes';
    }

    return [
        'question' => $question,
        'true_answer' => $true_answer,
        'false_answer' => $false_answer,
    ];
};

gameInterface($instructions, $get_question_data);
