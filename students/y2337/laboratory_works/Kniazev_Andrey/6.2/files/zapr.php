<!DOCTYPE html>

<head>
	<title>Запросы</title>
</head>

<body>
	<form action="1.html">
		<button type="submit">Назад</button>
	</form>
</body>
<?php
$host = 'localhost';
$dbname = 'postgres';
$dbuser = 'postgres';
$dbpass = '123';

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

function table($sql, $pdo)
{
	$ch = $pdo->query($sql);
	$result = $ch->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $line) {
		echo "<tr>";
		foreach ($line as $col_value) {
			echo "<td>$col_value</td>";
		}
		echo "</tr>";
	}
	echo "</table><br>";
}

echo 'Вывод Id породы, id курицы и содержание диеты';
$sql = 'select "Id_породы","Id_курица","Содержание_диеты" from public."Курица",public."Диета" where "Курица"."Номер_диеты" = "Диета"."Номер_диеты" group by "Диета"."Номер_диеты", "Курица"."Id_курица"';
echo "<table><tr><td>Id_породы</td><td>Id_курица</td><td>Содержание_диеты</td></tr></table>";
table($sql, $pdo);

echo 'Вывод максимальный номер диеты';
$sql = 'Select distinct max("Номер_диеты") from public."Диета"';
echo "<table><tr><td>Номер_диеты</td></tr></table>";
table($sql, $pdo);

echo '3. Вывести разницу в днях выпуска книги';
$sql = 'select "Зарплата","Id_Работника" from public."Работники" where "Зарплата" >= 2500;';
echo "<table><tr><td>Зарплата</td><td>Id_Работника</td>";
table($sql, $pdo);

?>