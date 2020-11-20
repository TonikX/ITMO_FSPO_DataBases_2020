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
	<div>Список всех директоров:</div>
	<?php
	$host='localhost';
	$dbname='postgres';
	$dbuser='postgres';
	$dbpass='1234';
	
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser,$dbpass);
	$sql = 'select * from public."Company_director"';
	echo "<table><tr><td>Id_Company_director</td><td>Name_director</td><td>Name</td><td>Address_company</td>";
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
	<h2>Введите ID директора, котрого хотите удалить</h2>
	<ul>
	<form name="insert" action = "deled2.php" method="POST">
	<br>ID:</br><br><input type="text" name="ID_Company_Director"/></br>
	<br><input type="submit" /></br>
	</ul>
</body>