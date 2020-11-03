<?php
	require_once "db_functions.php";
	require_once "database_connection.php";
	$message = "";
	$messagedelete = "";
	$checkid = $checktype = $checkdate = $checkgender = $checkname = "";
	$check = true;
	$regexp = "/^\d{4}-\d{2}-\d{2}$/";
	$oldid = $_POST["id"] ?? '';
	$oldtype = $_POST["type"] ?? '';
	$olddate = $_POST["date"] ?? '';
	$oldgender = $_POST["gender"] ?? '';
	$oldname = $_POST["name"] ?? '';
	if (isset($_POST["done"])) {
		/*
		проверка вводимого ID
		*/
		if (!is_numeric($_POST["id"]) and $_POST["id"] != null) {
			$checkid = "Можно вводить только числа";
			$check = false;
		}
		/*
		проверка вводимого вида
		*/
		if (!ctype_alpha($_POST["type"]) and $_POST["type"] != null) {
			$checktype = "Можно вводить только символы";
			$check = false;
		}
		/*
		проверка вводимой даты
		*/
		if ($_POST["date"] != null) {
			if (preg_match($regexp, $_POST["date"])) {
				$match = array();
				preg_match($regexp, $_POST["date"], $match);
				$year = substr($match[0], 0, 4);
				$month = substr($match[0], 5, 2);
				$day = substr($match[0], -2, 2);
				if ($year > 2020 || $year < 1950 || $month > 12  || $month < 1 || $day > 31 || $day < 1) {
					$checkdate = "Формат даты не распознан";
					$check = false;
				}
			}
			else {
				$checkdate = "Формат даты не распознан";
				$check = false;
			}
		}
		/*
		проверка вводимого пола
		*/
		if (($_POST["gender"] != "m" && $_POST["gender"] != "f") and $_POST["gender"] != null) {
			$checkgender = "Только 'm' или 'f'";
			$check = false;
		}
		/*
		проверка вводимого имени
		*/
		if (!ctype_alpha($_POST["name"]) and $_POST["name"] != null) {
			$checkname = "Можно вводить только символы";
			$check = false;
		}
		/*
		Если условия выполнены, то: 
		*/
		if ($check) {
			$sth = $pdo->prepare('Insert into animal values (:type, :date, :gender, :name, :id)');
			$sth->bindParam(':id', $_POST["id"]);
			$sth->bindParam(':type', $_POST["type"]);
			$sth->bindParam(':date', $_POST["date"]);
			$sth->bindParam(':gender', $_POST["gender"]);
			$sth->bindParam(':name', $_POST["name"]);
			if ($sth->execute() != null) {
				$message = "Информация внесена в таблицу";
			}
			else {
				$message = "Ошибка при вносе информации";
			}
		}
		/*
		проверка на ввод всех значений
		*/
		if (empty($_POST["id"]) || empty($_POST["type"]) || empty($_POST["date"]) || empty($_POST["gender"]) || empty($_POST["name"])) {
			$message = "Введите все поля формы";
		}
	}
	if (isset($_POST["done2"])) {
		$sth = $pdo->prepare('Delete from animal where "id_animal" = :id');
		$sth->bindParam(':id', $_POST["delete_id"]);
		if ($sth->execute() != null) {
				$messagedelete = "Информация удалена из таблицы";
			}
			else {
				$messagedelete = "Ошибка при удалении информации";
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rules.css">
</head>
<body>
	<a href="inserts.php">Меню</a>
	<form action = "<?=$_SERVER["PHP_SELF"]?>" method = "post">
		<ul>
			<li><label for = "id">ID животного: </label><input type = "text" id = "id" name = "id" value = "<?=htmlentities($oldid)?>" placeholder = "Введите ID животного"></li>
			<li style = "color : red"><?=$checkid?></li>
			<li><label for = "type">Вид животного: </label><input type = "text" id = "type" name = "type" value = "<?=htmlentities($oldtype)?>" placeholder = "Введите вид животного"></li>
			<li style = "color : red"><?=$checktype?></li>
			<li><label for = "date">Дата рождения животного (Y-M-D): </label><input type = "text" id = "date" name = "date" value = "<?=htmlentities($olddate)?>" placeholder = "Введите дату рождения животного"></li>
			<li style = "color : red"><?=$checkdate?></li>
			<li><label for = "gender">Пол животного: </label><input type = "text" id = "gender" name = "gender" value = "<?=htmlentities($oldgender)?>" placeholder = "Введите пол животного"></li>
			<li style = "color : red"><?=$checkgender?></li>
			<li><label for = "name">Имя животного: </label><input type = "text" id = "name" name = "name" value = "<?=htmlentities($oldname)?>" placeholder = "Введите имя животного"></li>
			<li style = "color : red"><?=$checkname?></li>
			<li><input type = "submit" name = "done" value = "Внести данные"></li>
		</ul>
		</form>
		<p><?=$message?></p>
		<?php
		$result = $pdo->query('Select * from animal order by "id_animal"')->fetchAll(pdo::FETCH_ASSOC);
		$keys = array_keys($result[0]);
		echo "<table><tr><td>";
		foreach($keys as $title) {
			echo "<th>$title</th>";
		}
		echo "</tr>";
		foreach($result as $line) {
			echo "<tr>";
			echo '<td><form method = "post" action = "'.$_SERVER["PHP_SELF"].'">';
			echo '<input type = "hidden" name = "delete_id" value = "'.$line["id_animal"].'">';
			echo '<input type = "submit" name = "done2" value = "Удалить">';
			echo '</form></td>';
			foreach($line as $col_value) {
				echo "<td>$col_value</td>";
			}
			echo '</tr>';	
		}
		?>
		<p><?=$messagedelete?></p>
</body>
</html>