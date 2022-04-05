<?php

function getUniqueArray($arr) {
    $unique = [];
    foreach ($arr as $value) {
        $duplicate = 0;
        foreach ($arr as $value2) {
            if($value == $value2) {
                $duplicate++;
            }
        }
        if($duplicate == 1) {
            $unique[] = $value;
        }
    }
    return $unique;
}

print_r(getUniqueArray([2,2,3,4,6,4,5,7,3]));