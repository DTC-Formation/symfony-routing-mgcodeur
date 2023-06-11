<?php

if(!function_exists('calculate')) {
    function calculate($numberA, $operator, $numberB) {
        return eval("return $numberA $operator $numberB;");
    }
}

if(!function_exists('isValidOperator')) {
    function isValidOperator($operator) {
        $allowedOperator = ['/', '*', '+', '-', '%'];
        return in_array($operator, $allowedOperator);
    }
}