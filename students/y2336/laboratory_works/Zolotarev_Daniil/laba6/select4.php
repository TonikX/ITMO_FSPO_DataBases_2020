<?php
$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query('SELECT "Author"."FIO_auuthor" FROM public."Contract" INNER JOIN public."Author" ON "Author"."ID_author" = "Contract"."ID_author" INNER JOIN public."Manager" ON "Contract"."ID_manager" = "Manager"."ID_manager" where "Manager"."Stage_manager" > 2;');
echo("Вывести имена авторов, которые являются участниками контракта с менеджером, стаж которого больше 2 лет:<br/>");
while ($row = $stmt->fetch())
{
    echo $row['FIO_auuthor'] . "<br/>";
}	                                                    
?>
