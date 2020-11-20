<!DOCTYPE html>
<head>
	<title>Insert</title>
</head>
<body>
	<form action="2.html">
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
	echo "<table><tr><td>Name_director</td><td>Id_Company_director</td><td>Address_company</td>";
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
	<h2>Введите информацию о директоре</h2>
	<ul>
	<form name="insert" action="added2.php" method="POST">
	<br>Director ID:</br><br><input type="text" name="ID_Company_Director"/></br>
	<br>Director's name:</br><br><input type="text" name="Name_director"/></br>
	<br>Company address:</br><br><input type="text" name="Address_company"/></br>
	<br><input type="submit" /></br>
	</ul>
</body>
