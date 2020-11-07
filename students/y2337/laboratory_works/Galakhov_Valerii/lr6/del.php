<!DOCTYPE html>
<head>
	<title>Delete</title>
	<meta http-equiv="Content Type">
	<meta content="text \html; charset=utf-8">
</head>

<body>
	<form action="3.html">
		<button type = "submit">Назад</button>
	</form>
	<div>Список всех компаний:</div>
	<?php
	$host='localhost';
	$dbname='postgres';
	$dbuser='postgres';
	$dbpass='1234';
	
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser,$dbpass);
	$sql = 'select * from public."Company"';
	echo "<table><tr><td>ID_company</td><td>Name</td><td>Address</td><td>Bank details</td>";
	$book = $pdo->query($sql);
	$result = $book->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $line) {
	echo "<tr>";
	foreach($line as $col_value) {
	echo "<td>$col_value</td>";
	}
	echo "</tr>";
	}
	echo "</table><br>";

	?>
	<h2>Введите ID компании, котрую хотите удалить</h2>
	<ul>
	<form name="insert" action = "del2.php" method="POST">
	<br>ID:</br><br><input type="text" name="ID_company"/></br>
	<br><input type="submit" /></br>
	</ul>
</body>