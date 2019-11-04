<?php
 function Sum($left, $right) {
    return $left + $right;
}

function Substract($left, $right) {
    return $left - $right;
}

function Mult($left, $right) {
    return $left * $right;
}

function Div($left, $right) {
    return $left / $right;
}

function Power($left, $right) {
    return pow($left, $right);
}

function Compare($left, $right) {
    return $left === $right;
}

function Calculate($firstNumber, $secondNumber, $operator) {
    $result = 0;
    switch ($operator) {
        case '+':
            $result = Sum($firstNumber, $secondNumber);
            break;
        case '-':
            $result = Substract($firstNumber, $secondNumber);
            break;
        case '*':
            $result = Mult($firstNumber, $secondNumber);
            break;
        case '/':
            $result = Div($firstNumber, $secondNumber);
            break;
        case '^':
            $result = Power($firstNumber, $secondNumber);
            break;
        case '?':
            $result = Compare($firstNumber, $secondNumber);
            break;
    }
    return $result;
}