<!DOCTYPE html>
<head>
	<title>Insert</title>
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
	$ID_Insurance_company = $_POST['ID_Insurance_company'];
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$sql = "INSERT INTO public.\"Insurance_company\" VALUES ($ID_Insurance_company, '$Name', '$Address')";
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