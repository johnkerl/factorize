<?php
function factorize($n)
{
    echo "$n =";
    if ($n < 0) {
        echo "Not factoring negative numbers";
        return;
    }
    if ($n < 2) {
        echo $n;
        return;
    }
    if ($n >= 65536) {
        echo "Not factoring $n >= 65536";
        return;
    }

    $d = 2;
    $nout = 0;
    while ($n > 1) {
        $power = 0;
        while (($n % $d) == 0) {
            $power += 1;
            $n /= $d;
        }
        if ($power == 1) {
            echo " ";
            if ($nout > 0) {
                echo "* ";
            }
            echo "$d";
            $nout += 1;
        }
        else if ($power > 1) {
            echo " ";
            if ($nout > 0) {
                echo "* ";
            }
            echo "$d^$power";
            $nout += 1;
        }
        $d += 1;
    }
}
factorize((integer)$_GET["n"]);
?>
