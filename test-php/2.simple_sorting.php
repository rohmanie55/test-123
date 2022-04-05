<?php

function simpleSort($arr){
    $sorted = false;
    while (!$sorted) {
        $sorted = true;
        for ($i = 0; $i < count($arr) - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$i + 1];
                $arr[$i + 1] = $temp;
                $sorted = false;
            }
        }
    }
    return $arr;
}

print_r(simpleSort([1,3,9,2,11,4,5]));