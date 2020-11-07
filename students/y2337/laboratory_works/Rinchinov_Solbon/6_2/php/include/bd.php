<?php 
$host = 'localhost';
$dbname = 'College';
$dbuser = 'postgres';
$dbpass = 'root';

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
?>