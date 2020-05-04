<?php
$arg1 = $_POST['id_profession'];
$arg3= $_POST['specialty'];
$arg2 = $_POST['action'];
echo("row was ".$arg2. "<br/>");
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg2 == "add"){
$pdo->query("INSERT INTO profession VALUES ('$arg1', '$arg3')");
}elseif($arg2 == "delete"){
$pdo->query("delete from profession where id_profession = '$arg1'");
}elseif($arg2 == "edit"){
$pdo->query("update profession set specialty = '$arg3' where id_profession = '$arg1'");
}
$data = $pdo->query('SELECT * FROM profession');
echo("Profession: <br/>");
foreach($data as $row){
echo " id: ".$row['id_profession']. " ";
echo " Specialty: ".$row['specialty']. "<br/>";
}
?>

