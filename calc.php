<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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

        function Calculate($expression = '') {
            $Arr = explode(" ", $expression);
            
            //for ($i = 0; $i < count($Arr); $i += 1)
            //    echo($Arr[$i]);

            $numArr = array();
            $opArr = array();

            for ($i = 0; $i < count($Arr); $i += 1) {
                if (preg_match('/[1-9]/', $Arr[$i])) {
                    array_push($numArr, $Arr[$i]);
                    continue;
                }

                if (preg_match('/\+|-|\*|\/|\^/', $Arr[$i])) {
                    array_push($opArr, $Arr[$i]);
                    continue;
                }

                break;
            }

            $sum = $numArr[0];
            for ($i = 0; $i < count($opArr); $i +=1) {
                switch ($opArr[$i]) {
                    case '+':
                        $sum = Sum($sum, $numArr[$i+1]);
                        break;
                    
                    case '-':
                        $sum = Substract($sum, $numArr[$i+1]);
                        break;
                    
                    case '*':
                        $sum = Mult($sum, $numArr[$i+1]);
                        break;

                    case '/':
                        $sum = Div($sum, $numArr[$i+1]);
                        break;

                    case '^':
                        $sum = Power($sum, $numArr[$i+1]);
                        break;
                }
            }

            return $sum;
        }

        //echo(trim(fgets(STDIN)));

        echo(Calculate("-5 + 4"));
        echo("\n");

        echo(Calculate("8 * 9"));
        echo("\n");

        echo(Calculate("7 ^ 2"));
    ?>   
</body>
</html>

