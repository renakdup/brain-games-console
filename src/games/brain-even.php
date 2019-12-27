<?php

use function BrainGames\core\gameInterface;

$instructions = 'Answer "yes" if the number is even, otherwise answer "no"';

$get_question_data = function () {
    $question = rand(0, 100);

    if ($question % 2 === 0) {
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
