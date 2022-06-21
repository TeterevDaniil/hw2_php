<?php

function task1(array $strings, bool $return = true)
{
    $result = implode("\n", array_map(function (string $str) {
        return "<p>$str</p>";
    }, $strings));

    if ($return) {
        return $result;
    }
    echo $result;
};

function task2(string $action, ...$args)
{

    foreach ($args as $n => $arg) {
        if (!is_int($arg) && !is_float($arg)) {
            trigger_error('argument ' . $n . ' is not integer of float');
            return 'ERROR: wrong argument';
        }
    }
    switch ($action) {
        case '+':
            return array_sum($args);

        case '-':
            return array_shift($args) - array_sum($args);

        case '/':
            $result = array_shift($args);
            foreach ($args as $arg) {
                if ($arg == 0) {
                    trigger_error('argument must not be zero');
                    return 'ERROR: wrong argument';
                }
                $result /= $arg;
            }
            return $result;
        case '*':
            $result = 1;
            foreach ($args as $arg) {
                $result *= $arg;
            }
            return $result;

        default:
            return 'ERROR: unknown action';
    }
};
function task3($a, $b)
{
    if (!is_int($a)) {
        trigger_error('EROOR: argument is not int');
        return false;
    }
    if (!is_int($b)) {
        trigger_error('EROOR: argument is not int');
        return false;
    }
    if ($a < 0 || $b < 0) {
        trigger_error('ERROR: arguments must be positive');
        return false;
    }

    $result = "<table border=1>";
    for ($i = 1; $i <= $a; $i++) {
        $result .= "<tr>";
        for ($j = 1; $j <= $b; $j++) {
            $result .= "<td>";
            $result .= $i * $j;
            $result .= "</td>";
        }
        $result .= "</tr>";
    }
    $result .= "</table>";
    echo $result;
};
function task4()
{
    date_default_timezone_set('Asia/Almaty');

    $result = date('d.m.Y H:i:i');
    $result .= '<br>';
    $result .= strtotime('24.02.2016 00:00:00');
    return $result;
};
function task5()
{
    $str = 'Карл у Клары украл Кораллы';
    $str2 = 'Две бутылки лимонада';

    $str = str_replace('К', '', $str) . '<br>';

    $str2 = str_replace('Две', 'Три', $str2) . '<br>';
    return $str . $str2;
};

function task6(string $filename)
{
    file_put_contents('test.txt', 'Hello again!');
    $fp = fopen($filename, 'r');
    if (!$fp) {
        return false;
    }
    $str = '';
    while (!feof($fp)) {
        $str .= fgets($fp, 1024);
    }
    echo $str;
};
