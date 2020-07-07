<?php
session_start();

$_SESSION['ses']= 23;

echo $_SESSION['ses']."<br>";

function func($t){

	$t++;
	
	echo "B теперь равно $t";
}


$i = 0; // тип int
$a=$i;
$b= 0.0008; // тип float
$text = 'Какой-то текст'; // тип string

$array = array(1,2,3); // массив

if($array[1] == 2 ) func($b); // условный оператор
else if($array[2]==3) echo $text;
else echo 'Что-то';


while($i!=2){ // цикл while
	
	$i++;
}

do{ // цикл do-while
	$i++;
}while($i!=3);
	
for($a=0;$a<5;$a++){ // цикл for
	$b=$a+1;
	echo "<br> $b $text";
	
}
foreach ($array as $value){ // цикл foreach
	
	echo"<br>$value";
}


?>