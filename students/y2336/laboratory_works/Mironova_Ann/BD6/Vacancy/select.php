<?php
$arg1 = $_POST['id_vacancy'];
$arg3= $_POST['conditionvacancies'];
$arg4 = $_POST['numberdays'];
$arg5 = $_POST['requirements'];
$arg6 = $_POST['salary'];
$arg7 = $_POST['id_employer'];
$arg2 = $_POST['action'];
echo("row was ".$arg2. "<br/>");
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg2 == "add"){
$pdo->query("INSERT INTO vacancy VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6', '$arg7')");
}elseif($arg2 == "delete"){
$pdo->query("delete from vacancy where id_vacancy = '$arg1'");
}elseif($arg2 == "edit"){
$pdo->query("update vacancy set conditionvacancies = '$arg3' and numberdays = '$arg4' and requirements = '$arg5' and salary = '$arg6' and id_employer = '$arg7' where id_vacancy = '$arg1'");
}
$data = $pdo->query('SELECT * FROM vacancy');
echo("Vacancy: <br/>");
foreach($data as $row){
echo " ID: ".$row['id_vacancy']. " ";
echo " Condition vacancies: ".$row['conditionvacancies']. "<br/>";
echo " Number days: ".$row['numberdays']. " ";
echo " Requirements: ".$row['requirements']. "<br/>";
echo " Salary: ".$row['salary']. "<br/>";
echo " ID_employer: ".$row['id_employer']. "<br/>";
}
?>

