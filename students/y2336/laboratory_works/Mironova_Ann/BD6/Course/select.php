<?php
$arg1 = $_POST['id_course'];
$arg3 = $_POST['dischargbymasteredprofessions'];
$arg4 = $_POST['courseprice'];
$arg5 = $_POST['reviews'];
$arg6 = $_POST['id_profession'];
$arg2 = $_POST['action'];
echo("row was ".$arg2. "<br/>");
echo("row was ".$arg1. "<br/>");
echo("row was ".$arg3. "<br/>");
echo("row was ".$arg5. "<br/>");
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg2 == "add"){
$pdo->query("INSERT INTO course VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6')");
}elseif($arg2 == "delete"){
$pdo->query("delete from course where id_course = '$arg1'");
}elseif($arg2 == "edit"){
$pdo->query("update course set dischargbymasteredprofessions = '$arg3' and courseprice = '$arg4' and reviews = '$arg5' and id_profession = '$arg6' where id_course = '$arg1'");
}
$data = $pdo->query('SELECT * FROM course');
echo("Course: <br/>");
foreach($data as $row){
echo " id: ".$row['id_course']. " ";
echo " Discharg by mastered professions: ".$row['dischargbymasteredprofessions']. "<br/>";
echo " Course price: ".$row['courseprice']. " ";
echo " ID_Profession: ".$row['id_profession']. "<br/>";
}
?>

