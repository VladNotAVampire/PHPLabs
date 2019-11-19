<?php
    require_once(__DIR__ . '/../Functions/calc.php');

    function tryCalculate(){
        if (!$_REQUEST->key_exists('operand1') || !$_REQUEST->key_exists('operator') || !$_REQUEST->key_exists('operand2'))
            return null;

        if (!in_array($_REQUEST['operator'], array('+', '-', '*', '/', '^', '?')))
            return null;

        return Calculate($_REQUEST[], $_REQUEST, $_REQUEST);
    }
?>

<h1>Calc</h1>
<from method="post">
    <input type = "number" name="operand1" placeholder="operand 1">
    <select name="operator" placeholder="operation">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
        <option>^</option>
        <option>?</option>
    </select>
    <input type = "number" name="operand2" placeholder="operand 2">
    <el>= <?=tryCalculate()?></el>
    </br>
    <input type="submit" value="calculate">
</form>