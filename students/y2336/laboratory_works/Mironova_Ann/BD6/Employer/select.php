<?php
$arg1 = $_POST['id_employer'];
$arg3= $_POST['data'];
$arg4 = $_POST['fieldofactivity'];
$arg5 = $_POST['reviews'];
$arg2 = $_POST['action'];
echo("row was ".$arg2. "<br/>");
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg2 == "add"){
$pdo->query("INSERT INTO employer VALUES ('$arg1', '$arg3', '$arg4', '$arg5')");
}elseif($arg2 == "delete"){
$pdo->query("delete from employer where id_employer = '$arg1'");
}elseif($arg2 == "edit"){
$pdo->query("update employer set data = '$arg3' and fieldofactivity = '$arg4' and reviews = '$arg5' where id_employer = '$arg1'");
}
$data = $pdo->query('SELECT * FROM employer');
echo("Employer: <br/>");
foreach($data as $row){
echo " id: ".$row['id_employer']. " ";
echo " Data: ".$row['data']. "<br/>";
echo " Field of activity: ".$row['fieldofactivity']. " ";
echo " Reviews: ".$row['reviews']. "<br/>";

}
?>

