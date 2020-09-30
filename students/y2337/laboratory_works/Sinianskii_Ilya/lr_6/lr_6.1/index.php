<?php
	session_start();
	$_SESSION['ses'] = TRUE;
	echo "session is ".$_SESSION['ses']."<br/>";
	$a = 1;
	$b = 2 + 0.2;
	$text = 'text';
	echo <<<TEXT
	a = $a <br/> 
	b = $b <br/>
	text = $text <br/>
TEXT;
	$arr = array(1,2,3);
	echo "arrey = ";
	
	for($i = 0; $i < 3; $i++){
		echo $arr[$i];}
	
	echo "<br/>arrey = ";
	foreach($arr as $a){
		echo $a;
	}
	$i = 0;
	echo "<br/>arrey = ";
	while($i < 3){
		echo $arr[$i];
		$i++;}
	$i = 0;
	echo "<br/>arrey = ";
	do{
		echo $arr[$i];
		$i++;}
	while($i < 3);
	function func($a = 0){
		if($a > 0)
			echo "<br/> 1";
		else
			echo "<br/> 0";}
	func(1);
?>