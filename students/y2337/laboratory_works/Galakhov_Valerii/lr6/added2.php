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
	$ID_Company_Director = $_POST['ID_Company_Director'];
	$Name_director = $_POST['Name_director'];
	$Address_company = $_POST['Address_company'];
	$sql = "INSERT INTO public.\"Company_director\" VALUES ('$Name_director', '$ID_Company_Director', '$Address_company')";
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