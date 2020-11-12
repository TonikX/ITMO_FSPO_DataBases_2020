<?php
	session_start();

	$_SESSION['login'] = 'user';

	echo $_SESSION['login']."<br>";

	$a = 1;

	echo $a."<br>";

	$b = 2.5;

	echo $b."<br>";

	$c = false;

	if ($c) echo "true <br>";
	else echo "false <br>";

	$arr = array(1,2,3,4);

	for ($i=3; $i < 6; $i++) { 
		$arr[$i] = $i+1;
	}

	foreach ($arr as $key) {
		echo $key." ";
	}

	echo "<br>";

	while ($i >= 1) {
		echo $i." ";
		$i = $i - 1;
	}

	echo "<br>";

	do {
		echo $i." ";
		$i++;
	} while ( $i <= 10);

	echo "<br>";

	function fun ($a, $b) {
		echo $a * $b;
	}

	fun ($a, $b);

	$_SESSION = array();
	
	session_destroy();
?>
