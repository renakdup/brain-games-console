<?php

namespace BrainGames\core;

use function cli\line;
use function cli\prompt;

/**
 * @param string   $instructions
 * @param callable $get_question_data  При вызове должен возвращать массив со следущими элементами
 *                                        array( 'question' => string,
 *                                               'true_answer' => string,
 *                                               'false_answer' => string/null ).
 *                                     Если 'false_answer' = null, то отображаем вместо него ответ пользователя.
 */
function gameInterface(string $instructions, callable $get_question_data)
{
    line('Welcome to the Brain Game!');
    line($instructions);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $number_question = 3;

    $questions_repeater = function ($number_repeat_question) use ($name, $get_question_data) {
        $number_last_question = $number_repeat_question - 1;

        // Определяем неверный результат
        $define_false_answer = function ($question_data, $user_answer): string {
            return $question_data['false_answer'] !== null
                        ? (string) $question_data['false_answer']
                        : (string) $user_answer;
        };

        for ($i = 0; $i < $number_repeat_question; $i++) {
            $question_data = $get_question_data();

            $question = $question_data['question'];

            $user_answer = prompt('Question: ' . $question);

            $true_answer = $question_data['true_answer'];
            $false_answer = $define_false_answer($question_data, $user_answer);


            line('Your answer: ' . $user_answer);

            if ($user_answer !== $true_answer) {
                line("'{$false_answer}' is wrong answer ;(. Correct answer was '{$true_answer}'.");
                line('Let\'s try again, ' . $name . '!');
                break;
            }


            line('Correct!');

            if ($i === $number_last_question) {
                line('Congratulations, ' . $name . '!');
            }
        }
    };

    $questions_repeater($number_question);
}
