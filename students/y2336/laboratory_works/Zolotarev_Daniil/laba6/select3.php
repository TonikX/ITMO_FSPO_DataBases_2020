<?php
$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query('SELECT "Author"."ID_author" FROM public."Author" WHERE "ID_author" IN (SELECT "Contract"."ID_author" FROM public."Contract" );');
echo("Вывести id авторов, у которых есть контракт:<br/>");
while ($row = $stmt->fetch())
{
    echo $row['ID_author'] . "\n";
}	                                                    
?>
