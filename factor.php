<!DOCTYPE html>
<html>
<head>

<!-- ================================================================ -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BZ8T9K9XYD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-BZ8T9K9XYD');
</script>
<!-- ================================================================ -->

<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- mobile-friendly -->
<title>A simple integer factorizer</title>
<link rel="shortcut icon" href="../favicon.ico" >
</head>

<!-- START SNIP -->
<!-- You should omit this next paragraph, down to "END SNIP", if you copy
this file. -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-15651652-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<!-- END SNIP -->

<body bgcolor="#ffffff" link="#a02222" vlink="#888888" alink="#cc3333">

<?php

# ================================================================
# John Kerl
# kerl.john.r@gmail.com
# 2013-04-07
# ================================================================

# ----------------------------------------------------------------
function index_of($char, $string)
{
    $n = strlen($string);
    for ($i = 0; $i < $n; $i++)
        if ($string[$i] == $char)
            return $i;
    return -1;
}

# ----------------------------------------------------------------
function make_cycle_decomposition($old_string, $new_string)
{
    $n = strlen($old_string);
    $cycdec = array();
    $marks = array_fill(0, $n, 0);

    for ($i = 0; $i < $n; $i++) {
        if ($marks[$i])
            continue;
        $cycle = array();
        $nexti = $i;
        $marks[$nexti] = 1;
        $num_passes = 0;
        while (1) {
            $num_passes++;
            if ($num_passes > $n) {
                echo "string_cycle_decomposition:  \"" . $old_string . "\" is not a permutation of \"" . $new_string . "\".";
                return array();
            }
            array_push($cycle, $old_string[$nexti]);

            $nextval = $new_string[$nexti];
            $nexti = index_of($nextval, $old_string);
            if ($nexti == -1) {
                echo "string_cycle_decomposition:  \"" . $old_string . "\" is not a permutation of \"" . $new_string . "\".";
                return array();
            }
            if ($nexti == $i)
                break;
            $marks[$nexti] = 1;
        }
        array_push($cycdec, $cycle);
    }
    return $cycdec;
}

# ----------------------------------------------------------------
function print_cycle_decomposition($old_string, $new_string)
{
    $cycdec = make_cycle_decomposition($old_string, $new_string);
    $n = count($cycdec);
    $num_cycles_printed = 0;
    for ($i = 0; $i < $n; $i++) {
        $m = count($cycdec[$i]);
        if ($m > 1) {
            $num_cycles_printed++;
            print "(";
            for ($j = 0; $j < $m; $j++)
                print $cycdec[$i][$j];
            print ")";
        }
    }
    if ($num_cycles_printed == 0)
        print "()";

    echo "<br>";
}

# ----------------------------------------------------------------
$old_string = 'SPHINX';

$usro = $_GET['o'];
$usrn = $_GET['n'];
$usrs = $_GET['s'];
$usrd = $_GET['d'];

$o = isset($usro) ? $usro : $old_string;
$n = isset($usrn) ? $usrn : $old_string;
$s = isset($usrs) ? $usrs : -1;
$d = isset($usrd) ? $usrd : -1;
$l = strlen($n);

#echo "<br>o = $o\n";
#echo "<br>n = $n\n";
#echo "<br>s = $s\n";
#echo "<br>d = $d\n";
#echo "<br>";

if (($s >= 0) && ($s < $l) && ($d >= 0) && ($d < $l)) {
    $temp  = $n[$d];
    $n[$d] = $n[$s];
    $n[$s] = $temp;
    $s = -1;
    $d = -1;
}

if ($s == -1) {
    echo "Click a letter in the second row.";
}
else {
    echo "Click another letter in the second row.";
}
echo "<br>";

echo "<b>";
for ($i = 0; $i < $l; $i++) {
    echo "  $o[$i]";
}
echo "</b>";
echo "<br>";

echo "<b>\n";
if ($s == -1) {
    for ($i = 0; $i < $l; $i++) {
        echo " <a href=\"cycdec.php?o=$o&n=$n&s=$i&d=$d\">" . $n[$i] . "</a>\n";
    }
}
else {
    for ($i = 0; $i < $l; $i++) {
        if ($i == $s) {
            $color1 = " <font color=#808080>";
            $color2 = " </font>";
        }
        else {
            $color1 = "";
            $color2 = "";
        }
        echo " <a href=\"cycdec.php?o=$o&n=$n&s=$s&d=$i\">$color1" . $n[$i] . "$color2</a>\n";
    }
}
echo "</b>\n";
echo "<br>";

echo "Cycle decomposition:";
print_cycle_decomposition($o, $n);

#echo "<br>";
#echo "<br>o = $o\n";
#echo "<br>n = $n\n";
#echo "<br>s = $s\n";
#echo "<br>d = $d\n";
#echo "<br>";

echo "<p>\n";
echo "<a href=\"cycdec.php\">Reset</a>\n";

?>

</body>
</html>
