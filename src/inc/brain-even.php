<?php

use function cli\line;
use function cli\prompt;

line('Welcome to the Brain Game!');
line('Answer "yes" if the number is even, otherwise answer "no".');

$name = prompt('May I have your name?');
line("Hello, %s!", $name);


$correct_answers = 0;

$output_question = function () use (&$correct_answers) {
    $rand_number = rand(0, 100);
    $is_even_number = $rand_number % 2 === 0;
    $number_unceasingly_correct_answers = 3; // количество необходимых верных ответов подряд

    $input_result = prompt('Question: ' . $rand_number);

    if ($input_result === 'yes' && $is_even_number || $input_result === 'no' && ! $is_even_number) {
        $correct_answers++;

        line('Correct!');

        if ($correct_answers >= $number_unceasingly_correct_answers) {
            line('Congratulations, Bill!');
            exit;
        }
    } else {
        $opposite_answer = $input_result === 'yes' ? 'no' : 'yes';

        line("'{$input_result}' is wrong answer ;(. Correct answer was '{$opposite_answer}'.");
        line('Let\'s try again, Bill!');
        exit;
    }
};


for ($i = 0; $i < 3; $i++) {
    $output_question();
}
