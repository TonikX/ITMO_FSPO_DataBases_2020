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
$dbpass = '1234';

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

function table($sql, $pdo)
{
	$book = $pdo->query($sql);
	$result = $book->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $line) {
		echo "<tr>";
		foreach ($line as $col_value) {
			echo "<td>$col_value</td>";
		}
		echo "</tr>";
	}
	echo "</table><br>";
}

echo '1. Вывод Id породы, id курицы и содержание диеты';
$sql = 'select "Id_породы","Id_курица","Содержание_диеты" from public."Курица",public."Диета" where "Курица"."Номер_диеты" = "Диета"."Номер_диеты" group by "Диета"."Номер_диеты", "Курица"."Id_курица"';
echo "<table><tr><td>Id_породы</td><td>Id_курица</td><td>Содержание_диеты</td>";
table($sql, $pdo);

echo '2. Вывести все данные из таблицы Book, где id_книги>1 или id_редактора=2';
$sql = 'select * from public."Book" where ("id_book">1 or "id_ed"=2)';
echo "<table><tr><td>Id_book</td><td>Id_ed</td><td>id_au</td><td>id_cus</td><td>id_con</td><td>id_cm</td><td>Тираж</td><td>Дата выпуска</td><td>Название</td>";
table($sql, $pdo);

echo '3. Вывести разницу в днях выпуска книги';
$sql = 'select current_date - "Дата-выпуска" as "Разница_в_днях",current_date,"Дата-выпуска" from public."Book"';
echo "<table><tr><td>Разница_в_днях</td><td>Сегодняшняя дата</td><td>Дата выпуска</td>";
table($sql, $pdo);

?>