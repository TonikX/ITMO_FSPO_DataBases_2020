<?php
//Запуск сессии
session_start();

$_SESSION['Язык'] = 'PHP';
$_SESSION['Число'] = 3;

echo $_SESSION['Язык']."<br>".$_SESSION['Число']."<br>";
//Пользовательская функция 1
function Test1($p1, $p2) {
	do {
		if ($p1 % 2 == 1) {
			echo $p2++.' ';
		}
		else {
			echo $p2--.' ';
		}
		$p1--;
	} while ($p1 > 0);
}
//Пользовательская функция 2
function Test2($p1) {
	if ($p1 > 0) {
		return true;
	}
	else {
		return false;
	}
}

//Переменные

$a1 = 10;
$a2 = 5;
$b = true;
$c = 1.23;
$d = 'String';
$temp;
$d .=' is working.<br>';

echo $d;
$temp = $a1 + $a2;
echo "$a1 + $a2 = $temp<br>";
$temp = $a1 + $c;
echo "$a1 + $c = $temp<br>";

//Массив 

$Array = array('а1', 'а2', 'а3', 'а4');

foreach($Array as $value) {
	echo "$value, ";
}

echo "<br>";
for ($i = 1; $i <= 10; $i++) {
	if ($i % 3 == 0) {
		echo "$i ";
	}
}
echo "<br>";
$temp = 0;
while ($temp != 10) {
	echo $temp++;
}
echo "<br>";
Test1(7, 3);
echo "<br>";
if (Test2(2)) {
	echo "Function is working";
}
?>
