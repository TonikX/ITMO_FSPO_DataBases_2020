<?php
session_start();


$_SESSION['s'] = 31;
echo $_SESSION['s']."<br/>";
$a = 1;
echo "a = $a<br/>";
$b = $a + 3.1;
echo "b = $b";
$str = "Text";
echo "<br/>str = $str";
$arr = array(1,2,3,4,5);

$size = count($arr);
echo "<br/>size of array = $size <br/>";

for($i = 0;$i < $size;$i++){
    $arr[$i] = $size-$i;
}

$i = 0;
do 
{
	echo "$i";
	$i++;
}while($i < $size); 

echo "<br/>arr = ";

foreach($arr as $a){
	echo "$a";
}

function func($a){
	echo "<br/>a = $a";
}

func(31);

?>

