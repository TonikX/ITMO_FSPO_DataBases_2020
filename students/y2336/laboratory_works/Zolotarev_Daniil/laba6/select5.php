<?php
$dbuser = 'danzolax';
$dbpass = '161200';
$host = 'localhost';
$dbname='zolax';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query('SELECT "Name_Book" FROM public."Book" INNER JOIN public."Publisher" ON
"Book"."ID_Book" = "Publisher"."ID_book" WHERE ("Publications_per_month" = 12)');
echo("Вывести название книги у которой количество публикаций в месяц равно 12:<br/>");
while ($row = $stmt->fetch())
{
    echo $row['Name_Book'] . "<br/>";
}	                                                    
?>
