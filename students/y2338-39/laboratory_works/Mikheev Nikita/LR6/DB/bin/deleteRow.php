<?php 
include "dbConnection.php";
//$tableName = "Teacher";
//$qry = "where \"id\" = '4' and \"Name\" = 'Vasyliy Ytkin'";
$tableName = $_POST['table'];
$qry = $_POST['qry'];
 $stmt = $pdo->exec("DELETE FROM \"$tableName\" $qry;");
echo $stmt;
?>