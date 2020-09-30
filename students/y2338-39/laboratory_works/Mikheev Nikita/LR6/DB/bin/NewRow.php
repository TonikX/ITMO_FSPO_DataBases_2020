<?php 

include "dbconnection.php";

$tableName = $_POST['table'];
$qry = $_POST['qry'];
 $stmt = $pdo->exec("INSERT INTO \"$tableName\" $qry;");
echo $stmt;

?>