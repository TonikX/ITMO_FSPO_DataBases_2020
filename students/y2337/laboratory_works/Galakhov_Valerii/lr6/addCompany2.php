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
	$ID_company = $_POST['ID_company'];
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$Bank_details = $_POST['Bank_details'];
	$sql = "INSERT INTO public.\"Company\" VALUES ('$ID_company', '$Name', '$Address', '$Bank_details')";
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