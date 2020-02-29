<?php

namespace BrainGames\Src\Games\BrainPrime;

use function BrainGames\Src\Core\gameInterface;

// Реализация взята из https://github.com/sabirsaid/isPrime
function isPrimeNumber($number)
{
    return ($number > 1) && (($number % 2 >= 1) && ($number % 3 >= 1) && ($number % 5 >= 1))
           || in_array($number, [2, 3, 5]);
}

function getQuestionData()
{
    $question = rand(0, 20);

    $trueAnswer = isPrimeNumber($question) ? 'yes' : 'no';

    return [
        'question' => $question,
        'trueAnswer' => $trueAnswer,
    ];
}

function run()
{
    $instructions = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $getQuestionData = function () {
        return getQuestionData();
    };

    gameInterface($instructions, $getQuestionData);
}
