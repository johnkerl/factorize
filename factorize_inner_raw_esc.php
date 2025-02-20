<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- mobile-friendly -->
</head>

<body>

<pre>
&lt;?php
function factorize($n)
{
	echo "$n =";
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
	$nout = 0;
	while ($n &gt; 1) {
		$power = 0;
		while (($n % $d) == 0) {
			$power += 1;
			$n /= $d;
		}
		if ($power == 1) {
			echo " ";
			if ($nout &gt; 0) {
				echo "* ";
			}
			echo "$d";
			$nout += 1;
		}
		else if ($power &gt; 1) {
			echo " ";
			if ($nout &gt; 0) {
				echo "* ";
			}
			echo "$d^$power";
			$nout += 1;
		}
		$d += 1;
	}
}
factorize((integer)$_GET["n"]);
?&gt;
</pre>
</body>
</html>
