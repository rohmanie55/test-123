<?php

function chessBoard($x, $y) {
    $i=1;
    while ($i <= $x) {
        $j=1;
        while ($j <= $y) {
            if (($i + $j) % 2 == 0) {
                echo "--";
            } else {
                echo "xx";
            }
            $j++;
        }
        echo "<br>";
        $i++;
    }
}

chessBoard(8, 2);