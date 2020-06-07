<?php
$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query('SELECT "Manager"."ID_manager" FROM public."Manager" WHERE"ID_manager" NOT IN (SELECT"Contract"."ID_manager" FROM public."Contract")');
echo("Вывести id менеджера, у которого нет контракта:<br/>");
while ($row = $stmt->fetch())
{
    echo $row['ID_manager'] . "\n";
}	                                                    
?>








