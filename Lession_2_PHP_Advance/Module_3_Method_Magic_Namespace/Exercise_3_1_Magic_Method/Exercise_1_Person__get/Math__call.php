<?php

class Math {
    public function __call($name, $arguments)
    {
        if($name === 'sum')
        return array_sum($arguments);
    }
}

$math = new Math();

$result = $math->sum(2, 4, 6, 8);
echo 'Sum: ' . $result;