<!DOCTYPE html>

<head>
	<title>Delete</title>
	<meta http-equiv="Content Type">
	<meta content="text \html; charset=utf-8">
</head>

<body>
	<form action="1.html">
		<button type="submit">Назад</button>
	</form>
	<h2>Введите id курицы, которую хотите удалить</h2>
	<ul>
		<form name="insert" action="del2.php" method="POST">
			<br>ID:</br><br><input type="text" name="id_курица" /></br>
			<br><input type="submit" /></br>
	</ul>
	<div>Список всех куриц:</div>
	<?php
	$host = 'localhost';
	$dbname = 'postgres';
	$dbuser = 'postgres';
	$dbpass = '12345';
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
	$sql = 'select * from public."Курица"';
	echo "<table><tr><td>Id_курица</td><td>Id_клетки</td><td>Id_породы</td><td>Id_птицефабрики</td><td>Вес</td><td>Количество_яиц_ежемесячно</td><td>Номер_диеты</td>";
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

	?>
</body>