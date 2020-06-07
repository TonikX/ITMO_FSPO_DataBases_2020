<?php
$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query('SELECT "ID_author" FROM public."Contract" WHERE "Sequence_authors" = \'no\' AND "Payment_authors" > \'10000\'');
echo("Вывести id авторов, которые писали книги единолично и оплата которых больше 10 000:<br/>");
while ($row = $stmt->fetch())
{
    echo $row['ID_author'] . "\n";
}	                                                    
?>
