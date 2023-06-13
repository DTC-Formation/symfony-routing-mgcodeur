<?php

namespace App\Contract;

interface CalculatorContract
{
    /**
     * @param int|float $number_a
     * @param string $operator
     * @param int|float $number_b
     * @return float|int|string
     */
    public function calculate($number_a, $operator, $number_b): float|int|string;
}
