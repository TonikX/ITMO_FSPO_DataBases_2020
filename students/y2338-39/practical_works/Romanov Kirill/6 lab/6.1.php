<?php

	session_start(); 
	$_SESSION['time'] = date("H:i:s");
	echo $_SESSION['time'];
	echo"<br>";
	function FindMaxValue($arr){
		$max = 0;
		foreach($arr as $x){
			if($x > $max)
				$max =$x;
		}

		echo "<br> func is over,that's all folks";
		return $max;
	}

	//echo 'Hello world' ;
	$itsTrue = true;
	$x = 1;
	$y = 'bruuh';

	if($itsTrue)
		echo "var itstrue is actually true ";
	else
		echo"Да как так то";

	$array = array(1, 2, 3, 4, '3', 5, 6, 7, 8, 9);
	$maxVal = FindMaxValue($array);

	echo "<br>";
	switch($maxVal){
		case 1:
			echo"nope";
			break;
		case 2:
			echo "definitely no";
			break;
		case 9:
			echo "yea right its 9";
			break;
	}

	$_SESSION = array();
	session_destroy();

/*Создать простой PHP-скрипт с использованием:
переменных различных типов;
массивов;
условных операторов всех типов;
циклов всех типов;
пользовательских функций;
сессий.*/	
?>

