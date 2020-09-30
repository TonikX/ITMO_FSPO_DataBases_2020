<?php 
include "dbConnection.php";
//$tableName = "Teacher";
//$qry = "where \"id\" = '4' and \"Name\" = 'Vasyliy Ytkin'";

$qry = $_POST['qry'];
 $stmt = $pdo->exec("$qry;");
echo $stmt;
?>