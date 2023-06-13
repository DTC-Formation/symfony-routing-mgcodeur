<?php

namespace App\Services;

use App\Contract\CalculatorContract;

class CalculatorService implements CalculatorContract
{

    public function calculate($number_a, $operator, $number_b): float|int|string
    {
        return match ($operator) {
            '+' => $number_a + $number_b,
            '-' => $number_a - $number_b,
            '*' => $number_a * $number_b,
            '/' => $number_a / $number_b,
            '%' => $number_a % $number_b,
            default => 'Invalid operator',
        };
    }
}