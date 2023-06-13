<?php

namespace App\Contract;

interface CalculatorContract
{
    /**
     * @param int|float $number_a
     * @param string $operator
     * @param int|float $number_b
     * @return string
     */
    public function calculate($number_a, $operator, $number_b): string;
}
