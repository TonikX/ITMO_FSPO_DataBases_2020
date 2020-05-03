<?php
session_start();
$Numbers = array('-1','4','7','-5','4','-3');
$Names = array('first','second','third');
$count = 0;

for($i = 0; $i < 6;$i++){
	if($Numbers[$i] > 0){
		$_SESSION[$Names[$count]] = $Numbers[$i];
		$count++;
	}
}
echo $_SESSION['first'];
echo $_SESSION['second'];
echo $_SESSION['third'];

?>

