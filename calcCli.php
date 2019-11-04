<?php
require_once(__DIR__ . "/Functions/calc.php");

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