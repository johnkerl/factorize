<!DOCTYPE html>
<html>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- mobile-friendly -->

<?php
function factorize($n)
{
    echo "<br/>$n: ";
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
    while ($n > 1) {
        $power = 0;
        while (($n % $d) == 0) {
            $power += 1;
            $n /= $d;
        }
        if ($power == 1) {
            echo " $d";
        }
        else if ($power > 1) {
            echo " $d^$power";
        }
        $d += 1;
    }
}
?>

<!--
<?php factorize((integer)$_POST["n"]); ?><br>
-->
<?php factorize((integer)$_GET["n"]); ?><br>

</body>
</html>
