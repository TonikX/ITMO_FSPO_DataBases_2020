<?php
$arg1 = $_POST['id_summary'];
$arg3= $_POST['desiredposition'];
$arg4 = $_POST['education'];
$arg5 = $_POST['id_jobseeker'];
$arg6 = $_POST['desiredsalary'];
$arg2 = $_POST['action'];
echo("row was ".$arg2. "<br/>");
echo("row was ".$arg1. "<br/>");
$dbuser = 'postgres';
$dbpass = '1234';
$host = 'localhost';
$dbname='Annn';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
if($arg2 == "add"){
$pdo->query("INSERT INTO summary VALUES ('$arg1', '$arg3', '$arg4', '$arg5', '$arg6')");
}elseif($arg2 == "delete"){
$pdo->query("delete from summary where id_summary = '$arg1'");
}elseif($arg2 == "edit"){
$pdo->query("update summary set desiredposition = '$arg3' and education = '$arg4' and id_jobseeker = '$arg5' and desiredsalary = '$arg6' where id_summary = '$arg1'");
}
$data = $pdo->query('SELECT * FROM summary');
echo("Summary: <br/>");
foreach($data as $row){
echo " ID: ".$row['id_summary']. " ";
echo " Desired position: ".$row['data']. "<br/>";
echo " Education: ".$row['fieldofactivity']. " ";
echo " ID_jobseeker: ".$row['id_jobseeker']. "<br/>";
echo " Desired salary: ".$row['desiredsalary']. "<br/>";

}
?>

