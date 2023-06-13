<?php

namespace App\Repository;


use App\Contract\CalculatorContract;

class CalculatorRepository implements CalculatorContract
{
    public function calculate($number_a, $operator, $number_b): string
    {
        return eval("return $number_a $operator $number_b;");
    }
}
