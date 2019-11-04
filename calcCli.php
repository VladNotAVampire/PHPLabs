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

        while(true)
        {

            $firstNumber = readline("First number: ");
            $secondNumber = readline("Second number: ");
            $operation = readline("Operator(+,-,*,/,^,?): ");
            #echo("first: " . $firstNumber . " second: " . $secondNumber . " oper: " . $operation);

            if (!preg_match('/[1-9]/', $firstNumber) ||
                !preg_match('/[1-9]/', $secondNumber) ||
                !preg_match('/\+|-|\*|\/|\^|\?/', $operation)) {
                        echo("Invalid input");
                        continue;
                    }
                
            echo(Calculate($firstNumber, $secondNumber, $operation) . "\n");
            
            if (preg_match('/Y|y|yes|Yes/',readline("Continue? Y / N \n")))
                continue;
            
            break;

        }
?> 