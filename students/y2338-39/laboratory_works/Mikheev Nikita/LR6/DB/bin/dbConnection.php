<?php 

$dbuser = 'postgres';
$dbpass = '';
$host = 'localhost';
$dbname = '';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname",$dbuser,$dbpass);


?>