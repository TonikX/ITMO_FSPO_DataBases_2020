<?php 

$bd =  bd_myconnect();

$value='Room';

$test = Array('RoomName'=>222);
	$res=pg_delete($bd,$value, $test,2048);
	echo($res);

function bd_connect($host, $bd_name, $bd_user, $bd_pass){
	return pg_connect("$host $bd_name $bd_user $bd_pass");
	
}

function bd_myconnect(){
		return bd_connect('host=localhost','dbname=hotel','user=postgres','password=3282');
}






?>