<!DOCTYPE html>
<head>
	<title>Delete</title>
</head>
<body>
	<form action="1.html">
	<button type = "submit">Назад</button>
	</form>
</body>
<?php
	$host='localhost';
	$dbname='postgres';
	$dbuser='postgres';
	$dbpass='1234';
	
	$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser,$dbpass);
	$id = $_POST['ID_company'];
	$sql = "delete from public.\"Company\" where \"ID_company\"=$id";
	$query = $pdo->prepare($sql);
	$result = $query->execute();
	$pdo = null;
	if ($result == 1) {
	echo "Успешно";
	}
	else {
	echo "Повторите ещё";
	}
?>