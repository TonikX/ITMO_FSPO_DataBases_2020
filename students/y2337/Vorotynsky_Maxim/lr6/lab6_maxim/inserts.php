<?php
$message = '';
require "dbfunctions.php";
$database = connectToDB('postgres', '1234', 'localhost', 'Hotel');
$oldid = $_POST["id"] ?? '';
$oldfloor = $_POST["floor"] ?? '';
$oldprice = $_POST["price"] ?? '';
if (isset($_POST["done"])) {
	if (empty($_POST["id"]) || empty($_POST["floor"]) || empty($_POST["price"]) || empty($_POST["type"])) {
		$message = "You have to enter all fields!";
	}
	else if (!is_numeric($_POST["id"]) || !is_numeric($_POST["floor"]) || !is_numeric($_POST["price"])) {
		$message = "You entered the wrong data!";
	}
	else {
		$sth = $database->prepare('Insert into public."Номер" values (:id, :floor, :price, :type)');
		$sth->bindParam(':id', $_POST["id"]);
		$sth->bindParam(':floor', $_POST["floor"]);
		$sth->bindParam(':price', $_POST["price"]);
		$sth->bindParam(':type', $_POST["type"]);
		if ($sth->execute() == null) {
			$message = "Information couldn't be inserted (smth went wrong)";
		}
		else {
			$message = "Information was succesfully inserted!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inserts</title>
	<style type="text/css">
		li {list-style: none; margin: 10px;}
		body {font-family: Arial}
	</style>
</head>
<body>
<a href="index.php">Menu</a>
<h3>Enter data about a hotel room to insert into the database:</h3>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<ul>
	<li><input type = "text" name = "id" placeholder="Введите ID номера:" value = "<?=htmlentities($oldid)?>"></li>
	<li><input type = "text" name = "floor" placeholder="Введите этаж номера:" value = "<?=htmlentities($oldfloor)?>"></li>
	<li><input type = "text" name = "price" placeholder="Введите цену за номер:" value = "<?=htmlentities($oldprice)?>"></li>
	<input type = "radio" name = "type" value = "Комфорт">Комфорт
	<input type = "radio" name = "type" value = "Люкс">Люкс
	<input type = "radio" name = "type" value = "Президентский номер">Президентский номер
	<li><input type = "submit" name = "done" value = "Внести данные"></li>
	</ul>
	<p><?=$message?></p>
	<p>All available rooms:</p>
	<?=selecting($database, 'Select * from public."Номер"')?>
</form>
</body>
</html>