<!DOCTYPE html>

<head>
	<title>Delete</title>
</head>

<body>
	<form action="del.php">
		<button type="submit">Назад</button>
	</form>
</body>
<?php
$host = 'localhost';
$dbname = 'postgres';
$dbuser = 'postgres';
$dbpass = '123';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$id = $_POST['id_курица'];
$sql = "delete from public.\"Курица\" where \"Id_курица\"=$id";
$query = $pdo->prepare($sql);
$result = $query->execute();
$pdo = null;
if ($result == 1) {
	echo "Удалено";
} else {
	echo "Повторите запрос";
}
?>