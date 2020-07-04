<!-- delete from public."Номер" where "Id_номера" = 6 -->
<?php
require "dbfunctions.php";
$database = connectToDB('postgres', '1234', 'localhost', 'Hotel');
$message = "";
$oldid = $_POST["id"] ?? "";
if (isset($_POST["done"])) {
	if (empty($_POST["id"])) {
		$message = "You forgot to enter id of the room!";
	}
	else if (!is_numeric($_POST["id"])) {
		$message = "You can only enter numbers!";
	}
	else {
		$sth = $database->prepare('Delete from public."Номер" where "Id_номера" = :id');
		$sth->bindParam(':id', $_POST["id"]);
		if ($sth->execute() == null) {
			$message = "Couldn't delete a room from database (smth went wrong)!";
		}
		else {
			$message = "Data succesfully deleted!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deletes</title>
	<style type="text/css">
		li {list-style: none; margin: 10px;}
		body {font-family: Arial}
	</style>
</head>
<body>
<a href="index.php">Menu</a>
<h3>Enter id of the hotel room to delete from the database:</h3>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<ul>
	<li><input type = "text" placeholder="Введите ID номера:" name = "id" value = "<?=htmlentities($oldid)?>"></li>
	<li><input type = "submit" name = "done" value = "Удалить номер из базы данных"></li>
	</ul>
	<p><?=$message?></p>
	<p>All available rooms:</p>
	<?=selecting($database, 'Select * from public."Номер"')?>
</form>
</body>
</html>