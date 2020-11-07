<!DOCTYPE html>
<head>
	<title>Insert</title>
</head>
<body>
	<form action="2.html">
	<button type = "submit">Назад</button>
	</form>
	<div>Список всех страховых компании:</div>
	<?php
	$host='localhost';
	$dbname='postgres';
	$dbuser='postgres';
	$dbpass='1234';
	
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser,$dbpass);
	$sql = 'select * from public."Insurance_company"';
	echo "<table><tr><td>Id_Insurance_company</td><td>Name</td><td>Address</td>";
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
	<h2>Введите информацию о страховой компании</h2>
	<ul>
	<form name="insert" action="insert2.php" method="POST">
	<br>Insurance company ID:</br><br><input type="text" name="ID_Insurance_company"/></br>
	<br>Name:</br><br><input type="text" name="Name"/></br>
	<br>Address:</br><br><input type="text" name="Address"/></br>
	<br><input type="submit" /></br>
	</ul>
</body>
