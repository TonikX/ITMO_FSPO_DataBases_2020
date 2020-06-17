<!DOCTYPE html>

<head>
	<title>Insert</title>
</head>

<body>
	<form action="insert.php">
		<button type="submit">Назад</button>
	</form>
</body>

<?php
$host = 'localhost';
$dbname = 'postgres';
$dbuser = 'postgres';
$dbpass = '123';
$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$id_chiken = $_POST['Id_курица'];
$id_cage = $_POST['Id_клетки'];
$id_breed = $_POST['Id_породы'];
$id_fact= $_POST['Id_птицефабрики'];
$weight = $_POST['Вес'];
$diet = $_POST['Номер_диеты'];
$eggs = $_POST['Количество_яиц_ежемесячно'];
$sql = "INSERT INTO public.\"Курица\" VALUES ($id_chiken, '$id_cage', '$id_breed', '$id_fact', '$weight', '$eggs', '$diet' )";
$query = $pdo->prepare($sql);
$result = $query->execute();
$pdo = null;
if ($result == 1) {
	echo "Добавлено успешно!";
} else {
	echo "Ошибка, повторите запрос";
}
?>