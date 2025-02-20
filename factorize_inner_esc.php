<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- mobile-friendly -->
</head>

<body>

<pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;
&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt; &lt;!-- mobile-friendly --&gt;

&lt;?php
function factorize($n)
{
    echo "&lt;br/&gt;$n: ";
    if ($n &lt; 0) {
        echo "Not factoring negative numbers";
        return;
    }
    if ($n &lt; 2) {
        echo $n;
        return;
    }
    if ($n &gt;= 65536) {
        echo "Not factoring $n &gt;= 65536";
        return;
    }

    $d = 2;
    while ($n &gt; 1) {
        $power = 0;
        while (($n % $d) == 0) {
            $power += 1;
            $n /= $d;
        }
        if ($power == 1) {
            echo " $d";
        }
        else if ($power &gt; 1) {
            echo " $d^$power";
        }
        $d += 1;
    }
}
?&gt;

&lt;!--
&lt;?php factorize((integer)$_POST["n"]); ?&gt;&lt;br&gt;
--&gt;
&lt;?php factorize((integer)$_GET["n"]); ?&gt;&lt;br&gt;

&lt;/body&gt;
&lt;/html&gt;
</pre>
</body>
</html>
