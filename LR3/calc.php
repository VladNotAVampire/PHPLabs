<?php
    require_once(__DIR__ . '/../Functions/calc.php');

    function tryCalculate(){
        if (!array_key_exists('operand1', $_REQUEST) || !array_key_exists('operator', $_REQUEST) || !array_key_exists('operand2', $_REQUEST))
            return null;

        if (!in_array($_REQUEST['operator'], array('+', '-', '*', '/', '^', '?')))
            return null;

        return Calculate($_REQUEST['operand1'], $_REQUEST['operand2'], $_REQUEST['operator']);
    }
?>

<h1>Calc</h1>
<form method="post">
    <input type = "number" name="operand1" placeholder="operand 1">
    <select name="operator" placeholder="operation">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
        <option>^</option>
    </select>
    <input type = "number" name="operand2" placeholder="operand 2">
    = <?=tryCalculate()?>
    <br/>
    <input type="submit" value="calculate">
</form>